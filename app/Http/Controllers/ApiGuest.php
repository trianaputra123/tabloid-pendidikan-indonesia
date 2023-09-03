<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kabupaten;
use Illuminate\Http\Request;

class ApiGuest extends Controller
{
    //
    public function getBerita()
    {
        $data = [
            'title' => 'Berita',
            'kabupaten' => Kabupaten::all(),
            'berita' => Berita::where('status', 'publish')->orderBy('created_at', 'desc')->get(),
        ];
        return response()->json($data);
    }
}
