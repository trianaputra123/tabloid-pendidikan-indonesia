<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    //
    public function home()
    {
        $data = [
            'title' => 'Admin || Dashboard'
        ];
        return view('admin.index', $data);
    }

    public function kabupaten()
    {
        $data = [
            'title' => 'Admin || Kabupaten',
            'kabupaten' => Kabupaten::all()
        ];
        return view('admin.kabupaten.index', $data);
    }

    public function kabupatenCreate()
    {
        $data = [
            'title' => 'Admin || Kabupaten || Create'
        ];
        return view('admin.kabupaten.create', $data);
    }

    public function kabupatenStore(Request $request)
    {
        $request->validate([
            'nama_kabupaten' => 'required|unique:kabupatens,nama_kabupaten'
        ]);

        // make slug
        $slug = Str::slug($request->nama_kabupaten);

        Kabupaten::create([
            'nama_kabupaten' => $request->nama_kabupaten,
            'slug' => $slug
        ]);

        return redirect()->route('admin.kabupaten.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function kabupatenEdit($id)
    {
        $data = [
            'title' => 'Admin || Kabupaten || Edit',
            'kabupaten' => Kabupaten::findOrFail($id)
        ];
        return view('admin.kabupaten.edit', $data);
    }

    public function kabupatenUpdate(Request $request, $id)
    {
        $request->validate([
            'nama_kabupaten' => 'required|unique:kabupatens,nama_kabupaten,' . $id
        ]);

        // make slug
        $slug = Str::slug($request->nama_kabupaten);

        Kabupaten::findOrFail($id)->update([
            'nama_kabupaten' => $request->nama_kabupaten,
            'slug' => $slug
        ]);

        return redirect()->route('admin.kabupaten.index')->with('success', 'Data berhasil diubah');
    }

    public function kabupatenDelete($id)
    {
        $kabupaten = Kabupaten::findOrFail($id);
        $kabupaten->delete();

        return redirect()->route('admin.kabupaten.index')->with('success', 'Data berhasil dihapus');
    }

    public function kecamatan()
    {
        $data = [
            'title' => 'Admin || Kecamatan',
            'kecamatan' => Kecamatan::all()
        ];
        return view('admin.kecamatan.index', $data);
    }

    public function kecamatanCreate()
    {
        $data = [
            'title' => 'Admin || Kecamatan || Create',
            'kabupaten' => Kabupaten::all()
        ];
        return view('admin.kecamatan.create', $data);
    }

    public function kecamatanStore(Request $request)
    {
        $request->validate([
            'nama_kecamatan' => 'required|unique:kecamatans,nama_kecamatan',
            'kabupaten_id' => 'required'
        ]);

        // make slug
        $slug = Str::slug($request->nama_kecamatan);

        Kecamatan::create([
            'nama_kecamatan' => $request->nama_kecamatan,
            'slug' => $slug,
            'kabupaten_id' => $request->kabupaten_id
        ]);

        return redirect()->route('admin.kecamatan.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function kecamatanEdit($id)
    {
        $data = [
            'title' => 'Admin || Kecamatan || Edit',
            'kecamatan' => Kecamatan::findOrFail($id),
            'kabupaten' => Kabupaten::all()
        ];
        return view('admin.kecamatan.edit', $data);
    }

    public function kecamatanUpdate(Request $request, $id)
    {
        $request->validate([
            'nama_kecamatan' => 'required|unique:kecamatans,nama_kecamatan,' . $id,
            'kabupaten_id' => 'required'
        ]);

        // make slug
        $slug = Str::slug($request->nama_kecamatan);

        Kecamatan::findOrFail($id)->update([
            'nama_kecamatan' => $request->nama_kecamatan,
            'slug' => $slug,
            'kabupaten_id' => $request->kabupaten_id
        ]);

        return redirect()->route('admin.kecamatan.index')->with('success', 'Data berhasil diubah');
    }

    public function kecamatanDelete($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();

        return redirect()->route('admin.kecamatan.index')->with('success', 'Data berhasil dihapus');
    }

    public function berita()
    {
        $data = [
            'title' => 'Admin || Berita',
            'berita' => Berita::all()
        ];
        return view('admin.berita.index', $data);
    }

    public function beritaCreate()
    {
        $data = [
            'title' => 'Admin || Berita || Create',
            'kecamatan' => Kecamatan::all()
        ];
        return view('admin.berita.create', $data);
    }

    public function beritaStore(Request $request)
    {
        $request->validate([
            'judul' => 'required|unique:beritas,judul',
            'isi' => 'required',
            'kecamatan_id' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // make slug
        $slug = Str::slug($request->judul);

        // upload image
        $imageName = time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('img/berita'), $imageName);

        Berita::create([
            'judul' => $request->judul,
            'slug' => $slug,
            'isi' => $request->isi,
            'gambar' => $imageName,
            'kecamatan_id' => $request->kecamatan_id,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function beritaEdit($id)
    {
        $data = [
            'title' => 'Admin || Berita || Edit',
            'berita' => Berita::findOrFail($id),
            'kecamatan' => Kecamatan::all()
        ];
        return view('admin.berita.edit', $data);
    }

    public function beritaUpdate(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|unique:beritas,judul,' . $id,
            'isi' => 'required',
            'kecamatan_id' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // make slug
        $slug = Str::slug($request->judul);

        // upload image
        if ($request->gambar) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('img/berita'), $imageName);
        } else {
            $imageName = Berita::findOrFail($id)->gambar;
        }

        Berita::findOrFail($id)->update([
            'judul' => $request->judul,
            'slug' => $slug,
            'isi' => $request->isi,
            'gambar' => $imageName,
            'kecamatan_id' => $request->kecamatan_id
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Data berhasil diubah');
    }

    public function beritaDelete($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Data berhasil dihapus');
    }

    public function beritaPublish(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $berita = Berita::findOrFail($id);
        $berita->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Data berhasil dipublish');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // upload image
        $imageName = time() . '.' . $request->upload->extension();
        $request->upload->move(public_path('img/berita'), $imageName);

        return response()->json([
            'uploaded' => true,
            'url' => asset('img/berita/' . $imageName)
        ]);
    }
}
