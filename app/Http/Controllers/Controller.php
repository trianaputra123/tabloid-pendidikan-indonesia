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
            'berita' => Berita::where('status', 'publish')->orderBy('created_at', 'desc')->paginate(6),
        ];
        return view('index', $data);
    }

    public function beritaDetail($slug)
    {
        $data = [
            'title' => 'Detail Berita',
            'kabupaten' => Kabupaten::all(),
            'berita' => Berita::where('slug', $slug)->firstOrFail(),
        ];
        return view('detail-berita', $data);
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
            // return redirect()->route('admin.home');
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.home');
            } else if (auth()->user()->role == 'reporter') {
                return redirect()->route('reporter.home');
            }
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('landing');
    }
}
