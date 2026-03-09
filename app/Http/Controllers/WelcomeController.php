<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WelcomeController extends Controller
{
    public function privacy()
    {
        return view('privacy');
    }
    
    public function requestDeletion()
    {
        return view('request-deletion');
    }

    /**
     * Handle account deletion request submission.
     *
     * POST /request-deletion-action
     */
    public function requestDeletionAction(Request $request)
    {
        // ── 1. VALIDASI ──────────────────────────────────────────────
        $validated = $request->validate([
            'full_name'   => 'required|string|max:255',
            'phone'       => 'required|string|max:20',
            'email'       => 'required|email|max:255',
            'nik'         => 'required|digits:16',
            'reason_type' => 'required|in:privacy,no_longer_use,duplicate,data_issue,other',
            'reason_detail' => 'required_if:reason_type,other|nullable|string|max:1000',
            'ktp_photo'   => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'agree_terms' => 'accepted',
            'agree_data'  => 'accepted',
        ], [
            'full_name.required'    => 'Nama lengkap wajib diisi.',
            'phone.required'        => 'Nomor telepon wajib diisi.',
            'email.required'        => 'Email wajib diisi.',
            'email.email'           => 'Format email tidak valid.',
            'nik.required'          => 'NIK wajib diisi.',
            'nik.digits'            => 'NIK harus 16 digit angka.',
            'reason_type.required'  => 'Pilih alasan penghapusan akun.',
            'reason_detail.required_if' => 'Jelaskan alasan penghapusan akun Anda.',
            'ktp_photo.required'    => 'Foto KTP wajib diunggah.',
            'ktp_photo.mimes'       => 'Format KTP harus JPG, PNG, atau PDF.',
            'ktp_photo.max'         => 'Ukuran KTP maksimal 5 MB.',
            'agree_terms.accepted'  => 'Anda harus menyetujui syarat penghapusan akun.',
            'agree_data.accepted'   => 'Anda harus menyetujui penggunaan data KTP.',
        ]);

        // ── 2. CEK DUPLIKAT (user yang sama belum selesai diproses) ───
        $userId = auth()->id(); // null jika akses dari luar app (via web publik)

        $alreadyPending = DB::table('account_deletion_requests')
            ->where(function ($q) use ($userId, $validated) {
                if ($userId) {
                    $q->where('user_id', $userId);
                } else {
                    $q->where('email', $validated['email'])
                    ->orWhere('nik', $validated['nik']);
                }
            })
            ->whereIn('status', ['pending', 'verified', 'processing'])
            ->exists();

        if ($alreadyPending) {
            return back()
                ->withInput()
                ->with('error', 'Permintaan penghapusan akun Anda sudah dalam proses. Silakan tunggu konfirmasi dari tim kami.');
        }

        // ── 3. SIMPAN FILE KTP ────────────────────────────────────────
        $ktpFile   = $request->file('ktp_photo');
        $ext       = $ktpFile->getClientOriginalExtension();
        $fileName  = 'ktp_' . Str::uuid() . '.' . $ext;

        // Simpan di storage/app/private/deletion-requests/ (tidak publik)
        $ktpPath = $ktpFile->storeAs('deletion-requests', $fileName, 'private');

        if (!$ktpPath) {
            return back()
                ->withInput()
                ->with('error', 'Gagal mengunggah foto KTP. Silakan coba lagi.');
        }

        // ── 4. GENERATE TICKET NUMBER ─────────────────────────────────
        $ticketNumber = 'DEL-' . date('Y') . '-' . strtoupper(Str::random(6));

        // Pastikan ticket unik
        while (DB::table('account_deletion_requests')->where('ticket_number', $ticketNumber)->exists()) {
            $ticketNumber = 'DEL-' . date('Y') . '-' . strtoupper(Str::random(6));
        }

        // ── 5. SIMPAN KE DATABASE ─────────────────────────────────────
        try {
            DB::table('account_deletion_requests')->insert([
                'user_id'        => $userId,
                'ticket_number'  => $ticketNumber,
                'full_name'      => $validated['full_name'],
                'phone'          => $validated['phone'],
                'email'          => $validated['email'],
                'nik'            => $validated['nik'],
                'reason_type'    => $validated['reason_type'],
                'reason_detail'  => $validated['reason_detail'] ?? null,
                'ktp_photo_path' => $ktpPath,
                'status'         => 'pending',
                'created_at'     => Carbon::now(),
                'updated_at'     => Carbon::now(),
            ]);
        } catch (\Exception $e) {
            // Hapus file yang sudah diupload kalau DB gagal
            Storage::disk('private')->delete($ktpPath);

            \Log::error('Account deletion request DB error: ' . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan permintaan. Silakan coba beberapa saat lagi.');
        }

        // ── 6. KIRIM NOTIFIKASI EMAIL (opsional, pastikan MAIL sudah dikonfigurasi) ──
        try {
            // Kirim ke user
            Mail::send('emails.deletion-request-user', [
                'name'         => $validated['full_name'],
                'ticketNumber' => $ticketNumber,
                'estimasi'     => '3–7 hari kerja',
            ], function ($m) use ($validated, $ticketNumber) {
                $m->to($validated['email'], $validated['full_name'])
                ->subject("[$ticketNumber] Permintaan Penghapusan Akun WIKU SuperApp");
            });

            // Kirim notif ke admin (opsional)
            // Mail::send('emails.deletion-request-admin', [...], fn($m) => $m->to(config('app.admin_email'))->subject('Permintaan Hapus Akun Baru: ' . $ticketNumber));

        } catch (\Exception $e) {
            // Email gagal tidak membatalkan proses
            \Log::warning('Deletion request email failed: ' . $e->getMessage());
        }

        // ── 7. KIRIM NOTIFIKASI WHATSAPP via N8N (opsional) ──────────
        // Uncomment jika sudah ada N8N webhook untuk WA notification
        //
        // try {
        //     Http::post(config('services.n8n.webhook_url'), [
        //         'type'          => 'account_deletion',
        //         'ticket'        => $ticketNumber,
        //         'name'          => $validated['full_name'],
        //         'phone'         => $validated['phone'],
        //         'reason'        => $validated['reason_type'],
        //     ]);
        // } catch (\Exception $e) {
        //     \Log::warning('N8N WA notification failed: ' . $e->getMessage());
        // }

        // ── 8. RESPONSE ───────────────────────────────────────────────
        return back()->with([
            'success'       => true,
            'ticket_number' => $ticketNumber,
        ]);
    }
}
