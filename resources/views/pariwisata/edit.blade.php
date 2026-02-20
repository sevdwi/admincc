@extends('layouts.head')

@section('content')
<div class="container">
    <h3>Edit pariwisata</h3>

    <form action="{{ route('pariwisata.update', $pariwisata) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nama" value="{{ $pariwisata->nama }}" class="form-control mb-2">
        <textarea name="deskripsi" class="form-control mb-2">{{ $pariwisata->deskripsi }}</textarea>
        <input type="text" name="alamat" value="{{ $pariwisata->alamat }}" class="form-control mb-2">
        <input type="text" name="latlong" value="{{ $pariwisata->latlong }}" class="form-control mb-2">

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
