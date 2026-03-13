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
        // $images = PariwisataImage::with('pariwisata')->latest()->get();
        // return view('pariwisata_images.index', compact('images'));
        $pariwisata = Pariwisata::with('images')->get();
        return view('pariwisata_images.index', compact('pariwisata'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function data_images_edit($id)
    {
        echo $id;
        die();
        $pariwisata = Pariwisata::all();
        return view('pariwisata_images.create', compact('pariwisata'));
    }
    
    public function create($id)
    {
        $pariwisata = Pariwisata::findOrFail($id);
        return view('pariwisata_images.create', compact('pariwisata'));

        // dd($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {

        // dd($request->all(), $request->file('image'));
        
        $request->validate([
            'image.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240'
        ]);
    
        if($request->hasFile('image')){
    
            foreach($request->file('image') as $file){
    
                $path = $file->store('pariwisata','public');
    
                PariwisataImage::create([
                    'pariwisata_id' => $id,
                    'image' => $path
                ]);
    
            }
        }
    
        return redirect()->route('pariwisata_images.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $pariwisata = Pariwisata::with('images')->findOrFail($id);
        return view('pariwisata_images.show', compact('pariwisata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $image = PariwisataImage::findOrFail($id);
        return view('pariwisata_images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $image = PariwisataImage::findOrFail($id);

        if($request->hasFile('image')){
    
            $file = $request->file('image')->store('pariwisata','public');
    
            $image->update([
                'image' => $file
            ]);
        }
    
        return redirect()->route('pariwisata_images.index');
        
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
