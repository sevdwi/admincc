<?php

namespace App\Http\Controllers;

use App\Models\Pariwisata;
use Illuminate\Http\Request;

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
        return view('pariwisata.show', compact('pariwisata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
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
