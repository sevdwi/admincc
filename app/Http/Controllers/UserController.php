<?php

namespace App\Http\Controllers;

use App\Models\UserAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // list semua admin
    public function index()
    {
        $users = UserAdmin::all();
        return view('users.index', compact('users'));
    }

    // form create
    public function create()
    {
        return view('users.create');
    }

    // simpan admin
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users_admin,email',
            'number'   => 'required|unique:users_admin,number',
            'password' => 'required|min:4',
        ]);

        UserAdmin::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'number'   => $request->number,
            'password' => $request->password, // auto hash oleh model
        ]);

        return redirect()->route('login');
    }

    // form edit
    public function edit(UserAdmin $user)
    {
        return view('users.edit', compact('user'));
    }

    // update
    public function update(Request $request, UserAdmin $user)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
        ]);

        $user->update([
            'name'   => $request->name,
            'email'  => $request->email,
            'number' => $request->number,
        ]);

        return redirect()->route('users.index');
    }

    // delete
    public function destroy(UserAdmin $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    // ------------------------------------------------------------------
    // AUTH ADMIN
    // ------------------------------------------------------------------

    // login form
    public function loginForm()
    {
        return view('auth.login');
    }

    // proses login
    public function login(Request $request)
    {
        $request->validate([
            'number'   => 'required',
            'password' => 'required'
        ], [
            'number.required' => 'Nomor harus diisi',
            'password.required' => 'Password harus diisi'
        ]);

        $credentials = [
            'number' => $request->number,
            'password' => $request->password
        ];

        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {

            $request->session()->regenerate();

            return redirect()->intended('/app/dashboard');
        }

        return back()
            ->withInput()
            ->withErrors([
                'login' => 'Nomor atau password salah.'
            ]);
    }

    // logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/administrator');
    }
}