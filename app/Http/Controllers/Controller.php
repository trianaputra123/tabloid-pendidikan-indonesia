<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\HariPeringatan;
use App\Models\Kabupaten;
use App\Models\Program;
use App\Models\SekapurSirih;
use App\Models\SistemInformasi;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

/**
    * @OA\Info(
    *      version="1.0.0",
    *      title="Dokumentasi API",
    *      description="Lorem Ipsum",
    *      @OA\Contact(
    *          email="hi.triana@gmail.com"
    *      ),
    *      @OA\License(
    *          name="Apache 2.0",
    *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
    *      )
    * )
    *
    * @OA\Server(
    *      url=L5_SWAGGER_CONST_HOST,
    *      description="Demo API Server"
    * )
    */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $data = [
            'title' => 'Landing Page',
            'kabupaten' => Kabupaten::all(),
            'berita' => Berita::where('status', 'publish')->orderBy('created_at', 'desc')->paginate(6),
            'hari_peringatan' => HariPeringatan::get()->first(),
            'sekaps' => SekapurSirih::get()->first(),
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

    public function about()
    {
        $data = [
            'title' => 'About',
            'kabupaten' => Kabupaten::all(),
            'sistem_informasi' => SistemInformasi::all(),
            'program' => Program::all(),
        ];
        return view('about', $data);
    }
}
