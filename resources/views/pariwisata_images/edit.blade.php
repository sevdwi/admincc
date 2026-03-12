<h3>Edit Gambar</h3>

<div class="mb-3">
<p>Gambar Saat Ini</p>

<img src="{{ asset('storage/'.$image->image) }}" width="300">
</div>

<form action="{{ route('pariwisata_images.update',$image->id) }}" 
method="POST" 
enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="mb-3">

<label>Ganti Gambar</label>

<input type="file" 
name="image" 
class="form-control">

</div>

<button class="btn btn-success">
Update
</button>

<a href="{{ route('pariwisata_images.index') }}" 
class="btn btn-secondary">
Kembali
</a>

</form>