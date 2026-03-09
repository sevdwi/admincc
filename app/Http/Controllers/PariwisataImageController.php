<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\PariwisataImage;
use App\Models\Pariwisata;

use Illuminate\Http\Request;

class PariwisataImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = PariwisataImage::with('pariwisata')->latest()->get();
        return view('pariwisata_images.index', compact('images'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pariwisata = Pariwisata::all();
        return view('pariwisata_images.create', compact('pariwisata'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pariwisata_id' => 'required',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);
    
        if ($request->hasFile('images')) {
    
            foreach ($request->file('images') as $file) {
    
                $path = $file->store('pariwisata','public');
    
                PariwisataImage::create([
                    'pariwisata_id' => $request->pariwisata_id,
                    'image' => $path
                ]);
            }
        }
    
        return redirect()->back()->with('success','Semua gambar berhasil diupload');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = PariwisataImage::findOrFail($id);
        Storage::disk('public')->delete($image->image);
        $image->delete();
        return back()->with('success','Gambar berhasil dihapus');
    }
}
