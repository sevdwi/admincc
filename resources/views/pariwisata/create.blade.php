@extends('layouts.head')

@section('content')
<div class="container">
    <h3>Tambah pariwisata</h3>

    <form action="{{ route('pariwisata.store') }}" method="POST">
        @csrf

        <input type="text" name="nama" class="form-control mb-2" placeholder="Nama">
        <textarea name="deskripsi" class="form-control mb-2" placeholder="Deskripsi"></textarea>
        <input type="text" name="alamat" class="form-control mb-2" placeholder="Alamat">
        <input type="text" name="latlong" class="form-control mb-2" placeholder="LatLong">

        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
