<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class albumfotocontroller extends Controller
{
    public function index()
    {
        $album = Album::orderByDesc('created_at')->get();
        return view('operator.albumfoto.index', compact('album'));
    }

    public function index2()
    {
        $album = Album::orderByDesc('created_at')->get();
        return view('viewer.albumfoto.index', compact('album'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('operator.albumfoto.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sampul = $request->file('sampul');
        $sampul->storeAs('public/album', $sampul->hashName());
        $album = Album::create([
            'judul' => $request->judul,
            'sampul' => $sampul->hashName(),
        ]);

        if ($album) {
            return redirect()->route('album.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('album.index')->with(['error' => 'Data Gagal Disimpan']);
        }
    }
    public function fotostore(Request $request, Album $album, $id)
    {
        $album = Album::find($id);
        $files = $request->file('foto');

        foreach ($files as $file) {

            $hashName = $file->hashName(); // Mendapatkan nama file yang diacak
            $file->storeAs('public/foto', $hashName); // Menyimpan file ke direktori yang benar

            // Memindahkan file dari path sementara ke lokasi yang benar
            $file->move(storage_path('app/public/foto'), $hashName);

            Foto::create([
                'album_id' => $album->id,
                'foto' => $hashName,
            ]);
        }

        return redirect()->route('album.show', $album->id)->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     */

    public function show($id)
    {
        $album = Album::find($id);
        return view('operator.albumfoto.show', compact('album'));
    }

    public function show2($id)
    {
        $album = Album::find($id);
        return view('viewer.albumfoto.show', compact('album'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $album = Album::find($id);
        return view('operator.albumfoto.update', compact('album'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $album = Album::findOrFail($id);
        if ($request->file('sampul') == "") {
            $album->update([
                'judul' => $request->judul,
            ]);
        } else {
            Storage::disk('local')->delete('public/album/' . $album->sampul);
            $sampul = $request->file('sampul');
            $sampul->storeAs('public/album', $sampul->hashName());
            $album->update([
                'judul' => $request->judul,
                'sampul' => $sampul->hashName(),
            ]);
        }
        if ($album) {
            return redirect()->route('album.index')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect()->route('album.index')->with(['error' => 'Data Gagal Diubah!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        Storage::disk('local')->delete('public/album/' . $album->gambar);
        $album->delete();
        if ($album) {
            return redirect()->route('album.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('album.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

    public function fotodestroy($id)
    {
        $foto = Foto::findOrFail($id);
        $albumId = $foto->album_id; // Mengambil album_id dari foto sebelum dihapus

        Storage::disk('local')->delete('public/foto/' . $foto->foto);
        $foto->delete();

        return redirect()->route('album.show', ['id' => $albumId])->with(['success' => 'Data Berhasil Dihapus']);
    }
}
