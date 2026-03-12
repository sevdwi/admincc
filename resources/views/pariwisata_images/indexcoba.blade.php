@extends('layouts.head-isi')

@section('content')
<a href="{{ route('pariwisata_images.index', $pariwisata->id) }}">
Lihat Gallery
</a>

@endforeach

</div>
@endsection