<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Akun - WIKU SuperApp</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --red-deep: #C0392B;
            --red-mid: #E74C3C;
            --red-light: #FADBD8;
            --slate-900: #0F172A;
            --slate-700: #334155;
            --slate-500: #64748B;
            --slate-300: #CBD5E1;
            --slate-100: #F1F5F9;
            --white: #FFFFFF;
            --amber: #F59E0B;
            --green: #10B981;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--slate-100);
            color: var(--slate-900);
            min-height: 100vh;
        }

        /* TOP HEADER */
        .top-bar {
            background: var(--slate-900);
            padding: 14px 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 12px rgba(0,0,0,0.3);
        }

        .top-bar-logo {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, var(--red-mid), var(--red-deep));
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 13px;
            color: white;
            letter-spacing: -0.5px;
        }

        .top-bar-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 15px;
            color: var(--white);
            letter-spacing: -0.2px;
        }

        .top-bar-sub {
            font-size: 12px;
            color: var(--slate-300);
            font-weight: 400;
        }

        /* HERO BANNER */
        .danger-banner {
            background: linear-gradient(135deg, #7F1D1D 0%, #991B1B 50%, #B91C1C 100%);
            padding: 32px 24px 28px;
            position: relative;
            overflow: hidden;
        }

        .danger-banner::before {
            content: '';
            position: absolute;
            top: -40px; right: -40px;
            width: 180px; height: 180px;
            border-radius: 50%;
            background: rgba(255,255,255,0.04);
        }

        .danger-banner::after {
            content: '';
            position: absolute;
            bottom: -20px; left: 30%;
            width: 100px; height: 100px;
            border-radius: 50%;
            background: rgba(255,255,255,0.03);
        }

        .danger-icon {
            width: 52px;
            height: 52px;
            background: rgba(255,255,255,0.12);
            border: 1.5px solid rgba(255,255,255,0.2);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            font-size: 24px;
        }

        .danger-banner h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 22px;
            font-weight: 800;
            color: white;
            letter-spacing: -0.5px;
            line-height: 1.2;
            margin-bottom: 8px;
        }

        .danger-banner p {
            font-size: 13.5px;
            color: rgba(255,255,255,0.75);
            line-height: 1.6;
        }

        /* CONTENT */
        .content {
            padding: 20px 16px 40px;
            max-width: 500px;
            margin: 0 auto;
        }

        /* WARNING CARD */
        .warning-card {
            background: var(--white);
            border-radius: 16px;
            border: 1px solid #FDE8E8;
            margin-bottom: 16px;
            overflow: hidden;
        }

        .warning-header {
            background: #FFF5F5;
            padding: 14px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid #FDE8E8;
        }

        .warning-header span.icon {
            font-size: 18px;
        }

        .warning-header span.label {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 13.5px;
            color: var(--red-deep);
        }

        .warning-list {
            padding: 14px 16px;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .warning-list li {
            font-size: 13px;
            color: var(--slate-700);
            line-height: 1.5;
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

        .warning-list li::before {
            content: '×';
            color: var(--red-mid);
            font-weight: 700;
            font-size: 15px;
            line-height: 1.3;
            flex-shrink: 0;
        }

        /* FORM CARD */
        .form-card {
            background: var(--white);
            border-radius: 16px;
            border: 1px solid var(--slate-300);
            margin-bottom: 16px;
            overflow: hidden;
        }

        .form-section-header {
            padding: 14px 16px 12px;
            border-bottom: 1px solid var(--slate-100);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-num {
            width: 24px; height: 24px;
            background: var(--slate-900);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 11px;
            color: white;
            flex-shrink: 0;
        }

        .form-section-header h3 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 14px;
            color: var(--slate-900);
        }

        .form-body {
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .field-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .field-label {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 600;
            font-size: 12.5px;
            color: var(--slate-700);
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .field-label .required {
            color: var(--red-mid);
        }

        .field-sub {
            font-size: 11.5px;
            color: var(--slate-500);
            margin-top: 2px;
            line-height: 1.4;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 11px 14px;
            border: 1.5px solid var(--slate-300);
            border-radius: 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            color: var(--slate-900);
            background: var(--white);
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
            -webkit-appearance: none;
        }

        input:focus, select:focus, textarea:focus {
            border-color: var(--red-mid);
            box-shadow: 0 0 0 3px rgba(231,76,60,0.1);
        }

        textarea {
            resize: none;
            min-height: 90px;
            line-height: 1.5;
        }

        select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%2364748B' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            padding-right: 36px;
        }

        /* UPLOAD AREA */
        .upload-area {
            border: 2px dashed var(--slate-300);
            border-radius: 12px;
            padding: 20px 16px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
            position: relative;
            background: var(--slate-100);
        }

        .upload-area:hover, .upload-area.dragover {
            border-color: var(--red-mid);
            background: #FFF5F5;
        }

        .upload-area input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        .upload-icon {
            font-size: 28px;
            margin-bottom: 8px;
            display: block;
        }

        .upload-area h4 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 13.5px;
            color: var(--slate-700);
            margin-bottom: 4px;
        }

        .upload-area p {
            font-size: 12px;
            color: var(--slate-500);
            line-height: 1.4;
        }

        .upload-preview {
            display: none;
            margin-top: 10px;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid var(--slate-300);
            background: var(--white);
            padding: 10px 12px;
            align-items: center;
            gap: 10px;
        }

        .upload-preview.show { display: flex; }

        .preview-thumb {
            width: 44px;
            height: 44px;
            border-radius: 6px;
            object-fit: cover;
            border: 1px solid var(--slate-200);
        }

        .preview-info { flex: 1; min-width: 0; }
        .preview-name {
            font-size: 12.5px;
            font-weight: 600;
            color: var(--slate-700);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .preview-size { font-size: 11px; color: var(--slate-500); }

        .preview-remove {
            width: 28px; height: 28px;
            background: #FEE2E2;
            border: none;
            border-radius: 6px;
            color: var(--red-deep);
            font-size: 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* CHECKBOX */
        .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 12px 14px;
            background: #FFF5F5;
            border: 1px solid #FDE8E8;
            border-radius: 10px;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--red-deep);
            cursor: pointer;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .checkbox-group label {
            font-size: 12.5px;
            color: var(--slate-700);
            line-height: 1.5;
            cursor: pointer;
        }

        .checkbox-group label strong {
            color: var(--red-deep);
            font-weight: 600;
        }

        /* SUBMIT BUTTON */
        .btn-submit {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, var(--red-mid), var(--red-deep));
            color: white;
            border: none;
            border-radius: 12px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: opacity 0.2s, transform 0.1s;
            box-shadow: 0 4px 15px rgba(192,57,43,0.35);
        }

        .btn-submit:hover { opacity: 0.92; }
        .btn-submit:active { transform: scale(0.98); }
        .btn-submit:disabled {
            background: var(--slate-300);
            color: var(--slate-500);
            box-shadow: none;
            cursor: not-allowed;
        }

        /* PROCESSING STATE */
        .btn-submit.loading::after {
            content: '';
            width: 16px; height: 16px;
            border: 2px solid rgba(255,255,255,0.4);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
        }

        @keyframes spin { to { transform: rotate(360deg); } }

        /* INFO CARD */
        .info-card {
            background: var(--white);
            border-radius: 16px;
            border: 1px solid var(--slate-200);
            padding: 14px 16px;
            display: flex;
            gap: 12px;
            align-items: flex-start;
            margin-bottom: 16px;
        }

        .info-card .info-icon {
            font-size: 20px;
            flex-shrink: 0;
            margin-top: 1px;
        }

        .info-card p {
            font-size: 12.5px;
            color: var(--slate-600);
            line-height: 1.55;
        }

        .info-card p strong {
            font-weight: 600;
            color: var(--slate-800);
        }

        /* SUCCESS MODAL */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15,23,42,0.6);
            z-index: 999;
            align-items: center;
            justify-content: center;
            padding: 24px;
            backdrop-filter: blur(4px);
        }

        .modal-overlay.show { display: flex; }

        .modal-box {
            background: white;
            border-radius: 20px;
            padding: 32px 24px;
            max-width: 340px;
            width: 100%;
            text-align: center;
            animation: modalIn 0.3s cubic-bezier(0.34,1.56,0.64,1);
        }

        @keyframes modalIn {
            from { opacity: 0; transform: scale(0.85) translateY(20px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }

        .modal-icon {
            width: 64px; height: 64px;
            background: #D1FAE5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin: 0 auto 18px;
        }

        .modal-box h2 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 800;
            font-size: 18px;
            color: var(--slate-900);
            margin-bottom: 10px;
            letter-spacing: -0.3px;
        }

        .modal-box p {
            font-size: 13.5px;
            color: var(--slate-500);
            line-height: 1.6;
            margin-bottom: 22px;
        }

        .ticket-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--slate-100);
            border: 1px solid var(--slate-200);
            border-radius: 8px;
            padding: 8px 14px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 13px;
            color: var(--slate-700);
            margin-bottom: 20px;
            letter-spacing: 0.5px;
        }

        .btn-close-modal {
            width: 100%;
            padding: 13px;
            background: var(--slate-900);
            color: white;
            border: none;
            border-radius: 10px;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
        }

        /* ALERT */
        .alert {
            padding: 12px 14px;
            border-radius: 10px;
            font-size: 13px;
            display: none;
            align-items: flex-start;
            gap: 8px;
            margin-bottom: 12px;
        }

        .alert.show { display: flex; }
        .alert.error { background: #FEE2E2; border: 1px solid #FECACA; color: var(--red-deep); }
        .alert.success { background: #D1FAE5; border: 1px solid #A7F3D0; color: #065F46; }
    </style>
</head>
<body>

<!-- TOP BAR -->
<div class="top-bar">
    <div class="top-bar-logo">W</div>
    <div>
        <div class="top-bar-title">WIKU SuperApp</div>
        <div class="top-bar-sub">Kabupaten Cilacap</div>
    </div>
</div>

<!-- HERO BANNER -->
<div class="danger-banner">
    <div class="danger-icon">⚠️</div>
    <h1>Hapus Akun</h1>
    <p>Permintaan penghapusan akun bersifat permanen dan tidak dapat dibatalkan setelah diproses.</p>
</div>

<!-- CONTENT -->
<div class="content">

    <!-- ALERT (dinampilkan jika ada error dari server) -->
    @if(session('error'))
    <div class="alert error show">
        <span>❌</span>
        <span>{{ session('error') }}</span>
    </div>
    @endif

    <!-- WARNING CARD -->
    <div class="warning-card">
        <div class="warning-header">
            <span class="icon">🚨</span>
            <span class="label">Perhatian Sebelum Melanjutkan</span>
        </div>
        <ul class="warning-list">
            <li>Seluruh data profil, riwayat pengajuan, dan dokumen Anda akan dihapus secara permanen.</li>
            <li>Laporan dan pengaduan yang sedang diproses akan dibatalkan otomatis.</li>
            <li>Akun tidak dapat dipulihkan setelah proses penghapusan selesai.</li>
            <li>Proses verifikasi dan penghapusan membutuhkan waktu <strong>3–7 hari kerja</strong>.</li>
        </ul>
    </div>

    <!-- FORM -->
    <form id="deletionForm" action="{{ route('account.deletion.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- SECTION 1: DATA DIRI -->
        <div class="form-card">
            <div class="form-section-header">
                <div class="section-num">1</div>
                <h3>Data Diri Pemohon</h3>
            </div>
            <div class="form-body">

                <div class="field-group">
                    <div class="field-label">Nama Lengkap <span class="required">*</span></div>
                    <input type="text" name="full_name" id="full_name"
                        placeholder="Sesuai KTP"
                        value="{{ auth()->user()->name ?? old('full_name') }}"
                        required>
                    @error('full_name')
                        <span class="field-sub" style="color: var(--red-mid)">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field-group">
                    <div class="field-label">Nomor Telepon Terdaftar <span class="required">*</span></div>
                    <input type="tel" name="phone" id="phone"
                        placeholder="08xxxxxxxxxx"
                        value="{{ auth()->user()->phone ?? old('phone') }}"
                        required>
                    @error('phone')
                        <span class="field-sub" style="color: var(--red-mid)">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field-group">
                    <div class="field-label">Email Terdaftar <span class="required">*</span></div>
                    <input type="email" name="email" id="email"
                        placeholder="email@contoh.com"
                        value="{{ auth()->user()->email ?? old('email') }}"
                        required>
                    @error('email')
                        <span class="field-sub" style="color: var(--red-mid)">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field-group">
                    <div class="field-label">NIK (Nomor Induk Kependudukan) <span class="required">*</span></div>
                    <input type="text" name="nik" id="nik"
                        placeholder="16 digit NIK sesuai KTP"
                        maxlength="16"
                        inputmode="numeric"
                        value="{{ old('nik') }}"
                        required>
                    <span class="field-sub">NIK digunakan untuk verifikasi identitas pemohon.</span>
                    @error('nik')
                        <span class="field-sub" style="color: var(--red-mid)">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </div>

        <!-- SECTION 2: ALASAN -->
        <div class="form-card">
            <div class="form-section-header">
                <div class="section-num">2</div>
                <h3>Alasan Penghapusan</h3>
            </div>
            <div class="form-body">

                <div class="field-group">
                    <div class="field-label">Pilih Alasan <span class="required">*</span></div>
                    <select name="reason_type" id="reason_type" required onchange="toggleOtherReason(this.value)">
                        <option value="" disabled selected>— Pilih alasan —</option>
                        <option value="privacy">Kekhawatiran privasi data</option>
                        <option value="no_longer_use">Tidak lagi menggunakan aplikasi</option>
                        <option value="duplicate">Akun duplikat</option>
                        <option value="data_issue">Masalah data tidak akurat</option>
                        <option value="other">Lainnya</option>
                    </select>
                    @error('reason_type')
                        <span class="field-sub" style="color: var(--red-mid)">{{ $message }}</span>
                    @enderror
                </div>

                <div class="field-group" id="other_reason_group" style="display:none">
                    <div class="field-label">Jelaskan Alasan Anda <span class="required">*</span></div>
                    <textarea name="reason_detail" id="reason_detail"
                        placeholder="Tuliskan alasan penghapusan akun secara singkat...">{{ old('reason_detail') }}</textarea>
                    @error('reason_detail')
                        <span class="field-sub" style="color: var(--red-mid)">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </div>

        <!-- SECTION 3: UPLOAD KTP -->
        <div class="form-card">
            <div class="form-section-header">
                <div class="section-num">3</div>
                <h3>Verifikasi Identitas (KTP)</h3>
            </div>
            <div class="form-body">

                <div class="field-group">
                    <div class="field-label">Foto KTP <span class="required">*</span></div>
                    <div class="upload-area" id="ktpUploadArea">
                        <input type="file" name="ktp_photo" id="ktp_photo"
                            accept="image/jpeg,image/png,image/jpg,application/pdf"
                            required onchange="handleFileUpload(this, 'ktpPreview')">
                        <span class="upload-icon">🪪</span>
                        <h4>Upload Foto KTP</h4>
                        <p>JPG, PNG, atau PDF · Maks. 5 MB<br>Pastikan foto jelas dan tidak terpotong</p>
                    </div>
                    <div class="upload-preview" id="ktpPreview">
                        <img class="preview-thumb" id="ktpThumb" src="" alt="preview">
                        <div class="preview-info">
                            <div class="preview-name" id="ktpFileName">—</div>
                            <div class="preview-size" id="ktpFileSize">—</div>
                        </div>
                        <button type="button" class="preview-remove" onclick="removeFile('ktp_photo','ktpPreview')">×</button>
                    </div>
                    <span class="field-sub">📌 Data KTP hanya digunakan untuk verifikasi dan akan dihapus setelah proses selesai.</span>
                    @error('ktp_photo')
                        <span class="field-sub" style="color: var(--red-mid)">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </div>

        <!-- KONFIRMASI -->
        <div class="info-card">
            <span class="info-icon">ℹ️</span>
            <p>Setelah dikirim, tim kami akan memverifikasi identitas Anda. Notifikasi status akan dikirim ke <strong>email dan nomor telepon</strong> yang terdaftar dalam waktu <strong>3–7 hari kerja</strong>.</p>
        </div>

        <!-- CHECKBOX AGREEMENT -->
        <div class="form-card" style="margin-bottom: 16px;">
            <div class="form-body">
                <div class="checkbox-group">
                    <input type="checkbox" id="agree_terms" name="agree_terms" value="1" required onchange="toggleSubmitBtn()">
                    <label for="agree_terms">
                        Saya memahami bahwa penghapusan akun bersifat <strong>permanen dan tidak dapat dibatalkan</strong>. Seluruh data saya akan dihapus sesuai kebijakan privasi WIKU SuperApp.
                    </label>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="agree_data" name="agree_data" value="1" required onchange="toggleSubmitBtn()">
                    <label for="agree_data">
                        Saya menyetujui bahwa data KTP yang saya unggah <strong>hanya digunakan untuk verifikasi identitas</strong> dan akan dihapus setelah proses selesai.
                    </label>
                </div>
            </div>
        </div>

        <!-- SUBMIT -->
        <button type="button" class="btn-submit" id="submitBtn" disabled onclick="confirmSubmit()">
            <span>🗑️</span> Kirim Permintaan Hapus Akun
        </button>

    </form>

</div>

<!-- SUCCESS MODAL -->
<div class="modal-overlay" id="successModal">
    <div class="modal-box">
        <div class="modal-icon">✅</div>
        <h2>Permintaan Dikirim!</h2>
        <p>Permintaan penghapusan akun Anda sedang diproses. Simpan nomor tiket berikut untuk keperluan tindak lanjut.</p>
        <div class="ticket-badge">
            🎫 <span id="ticketNumber">DEL-2024-XXXXX</span>
        </div>
        <p style="font-size:12px; margin-bottom: 20px;">Cek email & WhatsApp Anda untuk konfirmasi dan pembaruan status.</p>
        <button class="btn-close-modal" onclick="closeModal()">Tutup & Keluar</button>
    </div>
</div>

<!-- CONFIRM DIALOG (native) -->
<script>
function toggleOtherReason(val) {
    const group = document.getElementById('other_reason_group');
    group.style.display = (val === 'other') ? 'flex' : 'none';
    group.style.flexDirection = 'column';
    group.style.gap = '5px';
    document.getElementById('reason_detail').required = (val === 'other');
}

function toggleSubmitBtn() {
    const c1 = document.getElementById('agree_terms').checked;
    const c2 = document.getElementById('agree_data').checked;
    const btn = document.getElementById('submitBtn');
    btn.disabled = !(c1 && c2);
}

function handleFileUpload(input, previewId) {
    const file = input.files[0];
    if (!file) return;

    const maxSize = 5 * 1024 * 1024;
    if (file.size > maxSize) {
        alert('Ukuran file melebihi batas 5 MB. Silakan pilih file yang lebih kecil.');
        input.value = '';
        return;
    }

    const preview = document.getElementById(previewId);
    const prefix = previewId.replace('Preview', '');
    document.getElementById(prefix + 'FileName').textContent = file.name;
    document.getElementById(prefix + 'FileSize').textContent = (file.size / 1024).toFixed(1) + ' KB';

    if (file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById(prefix + 'Thumb').src = e.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        document.getElementById(prefix + 'Thumb').src = 'data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><rect width="40" height="40" rx="6" fill="%23EF4444"/><text x="50%" y="55%" text-anchor="middle" fill="white" font-size="12" font-family="sans-serif" dy=".1em">PDF</text></svg>';
    }

    preview.classList.add('show');
}

function removeFile(inputId, previewId) {
    document.getElementById(inputId).value = '';
    document.getElementById(previewId).classList.remove('show');
}

function confirmSubmit() {
    const name = document.getElementById('full_name').value;
    const confirmed = confirm(`Anda yakin ingin menghapus akun atas nama "${name}"?\n\nTindakan ini tidak dapat dibatalkan.`);
    if (!confirmed) return;

    const btn = document.getElementById('submitBtn');
    btn.disabled = true;
    btn.classList.add('loading');
    btn.querySelector('span').textContent = 'Memproses...';

    // Submit form ke server
    document.getElementById('deletionForm').submit();

    // Simulasi modal sukses (hapus bagian ini jika pakai redirect dari server)
    // setTimeout(() => showSuccess(), 1800);
}

function showSuccess(ticketNo = null) {
    if (ticketNo) {
        document.getElementById('ticketNumber').textContent = ticketNo;
    }
    document.getElementById('successModal').classList.add('show');
}

function closeModal() {
    window.location.href = '/';
}

// Drag & drop enhancement
['ktpUploadArea', 'selfieUploadArea'].forEach(id => {
    const area = document.getElementById(id);
    if (!area) return;
    area.addEventListener('dragover', e => { e.preventDefault(); area.classList.add('dragover'); });
    area.addEventListener('dragleave', () => area.classList.remove('dragover'));
    area.addEventListener('drop', e => {
        e.preventDefault();
        area.classList.remove('dragover');
        const input = area.querySelector('input[type="file"]');
        if (input && e.dataTransfer.files.length) {
            input.files = e.dataTransfer.files;
            input.dispatchEvent(new Event('change'));
        }
    });
});

// Tampilkan modal sukses jika ada session success dari Laravel
@if(session('success'))
    window.addEventListener('DOMContentLoaded', () => {
        showSuccess('{{ session("ticket_number") ?? "DEL-" . date("Y") . "-" . rand(10000,99999) }}');
    });
@endif
</script>

</body>
</html>