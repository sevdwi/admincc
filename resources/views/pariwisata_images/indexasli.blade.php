@extends('layouts.head-isi')

@section('content')
<div class="container" style=" position: relative;">
    <!-- <a href="{{ route('pariwisata_images.create') }}" class="btn btn-primary mt-4 mb-4">
        Tambah Gambar
    </a> -->
    <h1 class="text-center text-white text-fw-bold my-5">Gallery Gambar Pariwisata</h1>

    <div class="row">

        @foreach($images as $img)

        <div class="col-md-4 col-lg-3 mb-4 my-6">
            <div class="card shadow-sm h-100">

                <img src="{{ asset('storage/'.$img->image) }}" 
                    class="card-img-top" 
                    style="height:200px; object-fit:cover;">

                <div class="card-body text-center">

                    <h6 class="card-title">
                        {{ $img->pariwisata?->nama ?? 'Pariwisata tidak ditemukan' }}
                    </h6>

                    <form action="{{ route('pariwisata_images.destroy',$img->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">
                            Hapus
                        </button>
                    </form>

                </div>

            </div>
        </div>

        @endforeach

    </div>

    <a href="{{route('dashboard')}}" class="btn btn-success mb-3">Kembali</a>

</div>

@endsection