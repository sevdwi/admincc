@extends('layouts.head')

@section('content')
<div class="container">
    <h3>Data pariwisata</h3>

    <a href="{{ route('pariwisata.create') }}" class="btn btn-primary mb-3">Tambah</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        @foreach($pariwisata as $w)
        <tr>
            <td>{{ $w->nama }}</td>
            <td>{{ $w->alamat }}</td>
            <td>
                <a href="{{ route('pariwisata.edit', $w) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('pariwisata.destroy', $w) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
