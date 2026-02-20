@extends('layouts.head')

@section('content')
<h1>Edit User</h1>

<form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $user->name }}"><br><br>
    <input type="email" name="email" value="{{ $user->email }}"><br><br>
    <input type="text" name="number" value="{{ $user->number }}"><br><br>
    <button>Update</button>
</form>
@endsection
