<?php

namespace App\Http\Controllers;

use App\Models\Pariwisata;
use App\Models\PariwisataImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PariwisataController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth'); // WAJIB LOGIN
    // }

    public function index()
    {
        $pariwisata = Pariwisata::latest()->get();
        return view('pariwisata.index', compact('pariwisata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pariwisata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'latlong' => 'required'
        ]);

        Pariwisata::create($request->all());

        return redirect()->route('pariwisata.index')
                         ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pariwisata $pariwisata)
    {
        $pariwisata = Pariwisata::with('images')->find($id);
        return view('pariwisata.show', compact('pariwisata'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function data_images(Pariwisata $pariwisata)
    { 
        $images = PariwisataImage::with('pariwisata')->latest()->get();
        return view('pariwisata.data_images', compact('pariwisata','images'));
    }
    public function data_images_crt($id){ 
        $pariwisata = Pariwisata::where('id', $id)->first(); 
        return view('pariwisata.data_images_crt', compact('pariwisata'));        
    }
    public function data_images_edit($id){ 
        // $pariwisata = Pariwisata::where('id', $id)->first(); 

        $pariwisata = PariwisataImage::with('pariwisata')->where('id', $id)->first();  
        $id_img=$id;
        return view('pariwisata.data_images_edit', compact('pariwisata','id_img')); 
    }
    
    public function data_images_update(Request $request){
        $id=$request->id_img; 

        $pariwisata = PariwisataImage::with('pariwisata')->findOrFail($id);   
        if ($request->hasFile('image')) {
            // Hapus file lama
            if ($pariwisata->image && Storage::exists('public/'.$pariwisata->image)) {
                Storage::delete('public/'.$pariwisata->image);
            }

            // Upload file baru
            $path = $request->file('image')->store('pariwisata','public');
            $pariwisata->image = $path;
        }

        $pariwisata->save(); 
        // return redirect()->back()->with('success','Image berhasil diupdate');
        return redirect()->route('pariwisata.images', $request->id)
                         ->with('success','Gambar berhasil diupload dan tersimpan');

    }
    public function data_images_store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id' => 'required|exists:pariwisata,id',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $filename = time().'_'.str_replace(' ', '_', $file->getClientOriginalName());

            // Simpan file ke storage/app/public/pariwisata
            $path = $file->storeAs('pariwisata', $filename, 'public');

            try {
                // Insert ke database menggunakan create()
                PariwisataImage::create([
                    'pariwisata_id' => (int) $request->id,
                    'image' => $path
                ]);
            } catch (\Throwable $e) {
                // Tangkap semua error database
                dd('Gagal simpan database: '.$e->getMessage(), $e);
            }
        }

        return redirect()->route('pariwisata.images', $request->id)
                         ->with('success','Gambar berhasil diupload dan tersimpan');
    } 
    public function edit(Pariwisata $pariwisata)
    {
        return view('pariwisata.edit', compact('pariwisata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pariwisata $pariwisata)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'latlong' => 'required'
        ]);

        $pariwisata->update($request->all());

        return redirect()->route('pariwisata.index')
                         ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pariwisata $pariwisata)
    {
        $pariwisata->delete();

        return redirect()->route('pariwisata.index')
                         ->with('success', 'Data berhasil dihapus');
    }
}
