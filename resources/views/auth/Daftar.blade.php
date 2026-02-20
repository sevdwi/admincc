@extends('layouts.head')

@section('content')

<div id="particles">
    <div class="container-fluid main-content d-flex justify-content-evenly">
            <div style="width:400px;height:330px;">
                <div class="card shadow" style="background: rgba(255, 255, 255, 0.5); border: none;">
                    <div class="card-body text-center">
                        <img src="{{ asset('images/server.png') }}" width="60" class="mb-3">
                        <h1 class="mt-1 mb-2">Daftar Akun</h1>
                        <form action="{{ route('cc.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control"  name="nama_user" required autofocus >
                                
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required  >
                                <div id="emailHelp" class="form-text">We'll never share your password with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor HP</label>
                                <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" required  >
                            </div>
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>       
    </div>
</div>

@endsection