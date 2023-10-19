<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Liputan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RedaksiController extends Controller
{
    //

    public function home()
    {
        $data = [
            'title' => 'Redaksi || Dashboard'
        ];
        return view('admin.index', $data);
    }

    public function unpublishedBerita()
    {
        $data = [
            'title' => 'Redaksi || Manajemen Liputan dan Berita',
            'liputans' => Liputan::where('status', 'mengantri')->get(),
            // berita where status != publish
            'beritas' => Berita::get()->where('status', '!=', 'publish'),
        ];
        return view('redaksi.unpublish.index', $data);
    }

    public function Create()
    {
        $data = [
            'title' => 'Redaksi || Manajemen Liputan dan Berita || Create',
            'liputans' => Liputan::where('status', 'mengantri')->get(),
            // berita where status != publish
            // 'beritas' => Berita::get()->where('status', '!=', 'publish'),
        ];
        return view('redaksi.unpublish.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'nullable',
            'gambar.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'liputan_id' => 'required',
            // 'slug' => 'required',
        ]);

        // get liputan id
        $liputan = Liputan::findOrFail($request->liputan_id);

        try {
            DB::beginTransaction();
            $slug = Str::slug($request->judul . '-' . time());

            if ($request->hasFile('gambar')) {
                $foto = $request->file('gambar');

                // multiple file
                foreach ($foto as $f) {
                    $filename = time() . '-' . $f->getClientOriginalName();
                    $f->move(public_path('img/berita'), $filename);
                }
            }

            $data = [
                'judul' => $request->judul,
                'isi' => $request->isi,
                'gambar' => $filename,
                'kecamatan_id' => $liputan->kecamatan_id,
                'liputan_id' => $liputan->id,
                'slug' => $slug,
                'user_id' => auth()->user()->id,
                'status' => 'draft',
            ];

            Berita::create($data);

            // update status liputan
            $liputan->update([
                'status' => 'dibuat'
            ]);

            DB::commit();
            return redirect()->route('redaksi.berita-unpublish.index')->with('success', 'Berhasil menambahkan Berita');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            return redirect()->route('redaksi.berita-unpublish.index')->with('error', 'Gagal menambahkan Berita');
        }
    }

    public function CreateFromLiputan($id)
    {
        $data = [
            'title' => 'Redaksi || Manajemen Liputan dan Berita || Create',
            'liputan' => Liputan::findOrFail($id),
            'liputans' => Liputan::where('status', 'mengantri')->get(),
            // berita where status != publish
            // 'beritas' => Berita::get()->where('status', '!=', 'publish'),
        ];
        return view('redaksi.unpublish.create-from-liputan', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Redaksi || Manajemen Liputan dan Berita || Edit',
            'berita' => Berita::findOrFail($id),
            // berita where status != publish
            // 'beritas' => Berita::get()->where('status', '!=', 'publish'),
        ];
        return view('redaksi.unpublish.edit', $data);
    }
}
