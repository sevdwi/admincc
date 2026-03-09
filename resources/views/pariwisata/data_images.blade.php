@extends('layouts.head-isi')

@section('content')

<div class="container" style=" position: relative;">
    <h1 class="text-center text-white text-fw-bold my-4">Data Foto Pariwisata {{$pariwisata->nama}}</h1>

    <a href="{{ route('pariwisata.data_images.create',$pariwisata->id) }}" class="btn btn-primary mb-3">Tambah</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nama Wisata</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </table>
    <a href="{{route('pariwisata.index')}}" class="btn btn-success mb-3">Kembali</a>
</div>


@endsection
