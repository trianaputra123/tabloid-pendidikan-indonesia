<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\HariPeringatan;
use App\Models\Kabupaten;
use App\Models\Program;
use App\Models\SekapurSirih;
use App\Models\SistemInformasi;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

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
            if (auth()->user()->level == 'admin') {
                return redirect()->route('admin.home');
            } else if (auth()->user()->level == 'reporter') {
                return redirect()->route('reporter.home');
            } else if (auth()->user()->level == 'redaksi') {
                return redirect()->route('redaksi.home');
            } else if (auth()->user()->level == 'jurnalis') {
                return redirect()->route('jurnalis.home');
            } else if (auth()->user()->level == 'user') {
                return redirect()->route('user.home');
            }
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
            'kabupaten' => Kabupaten::all(),
        ];
        return view('auth.register', $data);
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        return redirect()->route('user.home');
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

    public function like($id)
    {
        try {
            $berita = Berita::findOrFail($id);
            DB::beginTransaction();
            // check if user already like this berita
            $check = $berita->likes()->where('user_id', auth()->user()->id)->first();

            if ($check) {
                // unlike
                $berita->likes()->where('user_id', auth()->user()->id)->delete();
                $berita->like -= 1;
                $berita->save();

                DB::commit();
                return response()->json([
                    'status' => true,
                    'message' => 'Berhasil unlike berita.',
                ], 200);
            } else {
                // like
                $berita->likes()->create([
                    'user_id' => auth()->user()->id,
                ]);
                $berita->like += 1;
                $berita->save();

                DB::commit();
                return response()->json([
                    'status' => true,
                    'message' => 'Berhasil like berita.',
                ], 200);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Gagal like berita. ' . $th->getMessage(),
            ], 500);
        }
    }

    public function getLike($id)
    {
        try {
            $berita = Berita::findOrFail($id);
            $check = $berita->likes()->where('user_id', auth()->user()->id)->first();

            if ($check) {
                return response()->json([
                    'status' => true,
                    'message' => 'Berhasil get like berita.',
                    'data' => [
                        'like' => true,
                    ],
                ], 200);
            } else {
                return response()->json([
                    'status' => true,
                    'message' => 'Berhasil get like berita.',
                    'data' => [
                        'like' => false,
                    ],
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal get like berita. ' . $th->getMessage(),
            ], 500);
        }
    }
}
