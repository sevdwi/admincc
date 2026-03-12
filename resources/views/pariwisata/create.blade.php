@extends('layouts.head-isi')

@section('content')
<div class="container" style=" position: relative;">
    <h3 class="text-center text-white my-4">Tambah pariwisata</h3>
    <a href="{{route('pariwisata.index')}}" class="btn btn-success mt-3 mb-3">Kembali</a>

    <div class="card" style="width: 80rem;">

        <form action="{{ route('pariwisata.store') }}" method="POST">
            @csrf

            <input type="text" name="nama" class="form-control card-header mb-2" placeholder="Nama">
            <ul class="list-group list-group-flush">
            <textarea name="deskripsi" class="form-control list-group-item mb-2" placeholder="Deskripsi"></textarea>
            <input type="text" name="alamat" class="form-control list-group-item mb-2" placeholder="Alamat">
            <input type="text" name="latlong" class="form-control list-group-item mb-2" placeholder="LatLong">
            </ul>

    </div>

            <button class="btn btn-primary mt-3">Simpan</button>
        </form>
    

</div>
@endsection
