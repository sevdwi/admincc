@extends('layouts.head-isi')

@section('content')
<div class="container" style=" position: relative;">
    <h3 class="text-center text-white my-4">Edit pariwisata</h3>
    <a href="{{route('dashboard')}}" class="btn btn-success mt-3 mb-3">Kembali</a>

    <div class="card" style="width: 80rem;">

        <form action="{{ route('pariwisata.update', $pariwisata) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="nama" value="{{ $pariwisata->nama }}" class="form-control card-header mb-2">
            <ul class="list-group list-group-flush">
            <textarea name="deskripsi" class="form-control list-group-item mb-2">{{ $pariwisata->deskripsi }}</textarea>
            <input type="text" name="alamat" value="{{ $pariwisata->alamat }}" class="form-control list-group-item mb-2">
            <input type="text" name="latlong" value="{{ $pariwisata->latlong }}" class="form-control list-group-item mb-2">
            </ul>
    </div>
            <button class="btn btn-primary mt-4">Update</button>
        </form>




</div>
@endsection
