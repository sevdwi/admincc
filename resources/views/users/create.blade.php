@extends('layouts.head')

@section('content')

<!-- <div id="particles"> -->
    <div class="container-fluid main-content d-flex justify-content-evenly">
            <div class="align-self-center mb-6" style="width:400px;height:330px;">
                <div class="card shadow" style="background: rgba(255, 255, 255, 0.5); border: none;">
                    <div class="card-body text-center">
                        <img src="{{ asset('images/server.png') }}" width="60" class="mb-3">
                        <h1 class="mt-1 mb-2">Daftar Akun</h1>
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control"  name="name" required autofocus >
                                
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required  >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor HP</label>
                                <input type="number" class="form-control" id="number" name="number" required  >
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required  >
                                <div id="emailHelp" class="form-text">We'll never share your password with anyone else.</div>
                            </div>

                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>       
    </div>
</div>

@endsection