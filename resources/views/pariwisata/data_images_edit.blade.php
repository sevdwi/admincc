@extends('layouts.head-isi')

@section('content')
<div class="container" style=" position: relative;background-color: #fff;">
    <h3 class="text-center text-black my-4">Edit Foto Pariwisata</h3>
    <a href="{{route('dashboard')}}" class="btn btn-success mt-3 mb-3">Kembali</a> 
   <form action="{{ route('pariwisata.data_images.update') }}" method="POST" enctype="multipart/form-data">
    @csrf  
    <div class="mb-3">
        <label class="form-label">Nama Tempat</label>
        <input type="text" name="nama" value="{{ $pariwisata->pariwisata->nama }}" class="form-control">
        <input type="hidden" name="id" value="{{ $pariwisata->pariwisata->id }}" class="form-control">
        <input type="hidden" name="id_img" value="{{ $id_img }}" class="form-control">
    </div> 

    <div class="mb-3">
        <label class="form-label">Upload Gambar</label> 
        @if($pariwisata->image)
            <div class="mb-2">
                <center><img src="{{ asset('storage/'.$pariwisata->image) }}" width="250" height="250" class="img-thumbnail"></center>
            </div>
        @endif

        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-primary">Update Data</button><br><br><br>
</form>
</div>
@endsection
