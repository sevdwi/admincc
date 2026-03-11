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
        @foreach($images as $img)
        <tr>
            <td>{{$pariwisata->nama}}</td>
            <td><img src="{{ asset('storage/'.$img->image) }}" width="100px" height="100px"><br>{{$img->image}}</td>
            <td>
                <a href="{{ route('pariwisata.data_images.edit',$img->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                <a href="{{ route('pariwisata.data_images.hapus',$img->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                <button 
                class="btn btn-sm btn-success btn-view"
                data-image="{{ asset('storage/'.$img->image) }}"
                data-bs-toggle="modal"
                data-bs-target="#imageModal">
                <i class="fa fa-eye"></i>
            </button>
            </td>
        </tr>
        @endforeach
    </table>
    <a href="{{route('pariwisata.index')}}" class="btn btn-success mb-3">Kembali</a>
</div>
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Detail Gambar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <img id="modalImage" src="" class="img-fluid">
            </div>

        </div>
    </div>
</div>
<script>
document.querySelectorAll('.btn-view').forEach(button => {

    button.addEventListener('click', function() {

        let image = this.getAttribute('data-image');

        document.getElementById('modalImage').src = image;

    });

});
</script>


@endsection
