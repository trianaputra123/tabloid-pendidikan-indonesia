<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kabupaten;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $data = [
            'title' => 'Landing Page',
            'kabupaten' => Kabupaten::all(),
            'berita' => Berita::all(),
        ];
        return view('index', $data);
    }

    public function auth()
    {
        $data = [
            'title' => 'Login',
            'kabupaten' => Kabupaten::all(),
        ];
        return view('auth.login', $data);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('admin.home');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('landing');
    }
}
