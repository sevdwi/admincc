@extends('layouts.head-isi')

@section('content')
<div class="container" style=" position: relative;">
    <h1 class="text-center text-white text-fw-bold my-5">Gallery Gambar Pariwisata</h1>

    <table class="table table-bordered">

        <tr>
        <th>No</th>
        <th>Nama Wisata</th>
        <th>Jumlah Gambar</th>
        <th>id</th>
        <th>Action</th>
        </tr>

        @foreach($pariwisata as $p)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $p->nama }}</td>

            <td>{{ $p->images->count() }}</td>

            <td>{{ $p->id}}</td>

        <td>

        <a href="{{ route('pariwisata_images.create',$p->id) }}" class="btn btn-primary btn-sm">
        Tambah
        </a>

        @if($p->images->first())

            <!-- <a href="{{ route('pariwisata_images.edit',$p->images->first()->id) }}" class="btn btn-warning btn-sm">
            <i class="fa fa-edit"></i>
            </a> -->

            <form action="{{ route('pariwisata_images.destroy',$p->images->first()->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger btn-sm">
                <i class="fa fa-trash"></i>
                </button>

            </form>

            <a href="{{ route('pariwisata_images.show',$p->id) }}" class="btn btn-warning btn-sm"> 
                Detail
            </a>


        @endif

        </td>

        </tr>

        @endforeach

    </table>
    <a href="{{route('dashboard')}}" class="btn btn-success mt-3">Kembali</a>

</div>

@endsection