<?php

namespace App\Http\Controllers;

use App\Models\prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class prestasicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestasi = Prestasi::orderByDesc('created_at')->get();
        return view('operator.prestasi.index', compact('prestasi'));
    }

    public function index2()
    {
        $prestasi = Prestasi::orderByDesc('created_at')->get();
        return view('viewer.prestasi.index', compact('prestasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('operator.prestasi.tambah');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $foto->storeAs('public/prestasi', $foto->hashName());
        $prestasi = Prestasi::create([
            'siswa'=>$request->siswa,
            'namaprestasi' => $request->namaprestasi,
            'peringkat' => $request->peringkat,
            'tingkat' => $request->tingkat,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto->hashName(),
        ]);

        if ($prestasi) {
            return redirect()->route('prestasi.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('prestasi.index')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $prestasi = Prestasi::find($id);
        return view('operator.prestasi.show', compact('prestasi'));
    }

    public function show2($id)
    {
        $prestasi = Prestasi::find($id);
        return view('viewer.prestasi.show', compact('prestasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $prestasi = Prestasi::find($id);
        return view('operator.prestasi.update', compact('prestasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $prestasi = Prestasi::findOrFail($id);
        if ($request->file('foto') == "") {
            $prestasi->update([
                'siswa'=>$request->siswa,
                'namaprestasi' => $request->namaprestasi,
                'peringkat' => $request->peringkat,
                'tingkat' => $request->tingkat,
                'tanggal' => $request->tanggal,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            Storage::disk('local')->delete('public/prestasi/' . $prestasi->foto);
            $foto = $request->file('foto');
            $foto->storeAs('public/prestasi', $foto->hashName());
            $prestasi->update([
                'siswa'=>$request->siswa,
                'namaprestasi' => $request->namaprestasi,
                'peringkat' => $request->peringkat,
                'tingkat' => $request->tingkat,
                'tanggal' => $request->tanggal,
                'deskripsi' => $request->deskripsi,
                'foto' => $foto->hashName(),
            ]);
        }
        if ($prestasi) {
            return redirect()->route('prestasi.index')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect()->route('prestasi.index')->with(['error' => 'Data Gagal Diubah!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        Storage::disk('local')->delete('public/prestasi/' . $prestasi->gambar);
        $prestasi->delete();
        if ($prestasi) {
            return redirect()->route('prestasi.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('prestasi.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
