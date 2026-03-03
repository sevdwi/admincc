@extends('layouts.head-isi')

@section('content')
<div class="container" style=" position: relative;">
    <h3 class="text-center text-white my-4">Tambah pariwisata</h3>
    <a href="{{route('dashboard')}}" class="btn btn-success mt-3 mb-3">Kembali</a>
    <form action="{{ route('pariwisata.store') }}" method="POST">
        @csrf

        <input type="text" name="nama" class="form-control mb-2" placeholder="Nama">
        <textarea name="deskripsi" class="form-control mb-2" placeholder="Deskripsi"></textarea>
        <input type="text" name="alamat" class="form-control mb-2" placeholder="Alamat">
        <input type="text" name="latlong" class="form-control mb-2" placeholder="LatLong">

        <button class="btn btn-primary">Simpan</button>
    </form>
    

</div>
@endsection
