<a href="{{ route('pariwisata_images.create') }}" class="btn btn-primary mb-3">Tambah</a>
<div class="mt-2">
@foreach($images as $img)

<div>
    <p>{{ $img->pariwisata->nama }}</p><p>{{ $img->pariwisata?->nama ?? 'Pariwisata tidak ditemukan' }}</p>
    <img src="{{ asset('storage/'.$img->image) }}" width="200">

    <form action="{{ route('pariwisata_images.destroy',$img->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </form>

</div>

@endforeach
</div>