<form action="{{ route('pariwisata_images.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Wisata</label>
    <select name="pariwisata_id" required>
        @foreach($pariwisata as $p)
            <option value="{{ $p->id }}">{{ $p->nama }}</option>
        @endforeach
    </select>

    <br><br>

    <label>Upload Gambar</label>
    <input type="file" name="images[]" multiple required>

    <br><br>

    <button type="submit">Upload</button>
</form>