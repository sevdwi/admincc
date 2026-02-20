@extends('layouts.head')

@section('content')
<div class="text-white">
    <h1>Dashboard</h1>
    <p>Halo, {{ auth()->user()->name }}</p>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button>Logout</button>
    </form>
</div>

<div class="text-white">
    <h1>Pariwisata</h1>
    <button type="submit" class="btn btn-success"><a href="{{route('pariwisata.index')}}"style="color: #fff;">Buat Data Pariwisata</a></button>

</div>
@endsection
