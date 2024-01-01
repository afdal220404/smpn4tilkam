<?php

namespace App\Http\Controllers;

use App\Models\guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class gurucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::orderByDesc('nama')->get();
        return view('operator.guru.index', compact('guru'));
    }
    public function index2()
    {
        $guru = Guru::orderByDesc('nama')->get();
        return view('viewer.guru.index', compact('guru'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
       return view('operator.guru.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $foto->storeAs('public/guru', $foto->hashName());
        $guru = Guru::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'foto' => $foto->hashName(),
        ]);

        if ($guru) {
            return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('guru.index')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(guru $guru)
    {
        //aa
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $guru = Guru::find($id);
    return view('operator.guru.update', compact('guru'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $guru = Guru::findOrFail($id);
        if ($request->file('foto') == "") {
            $guru->update([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'mapel' => $request->mapel,
            ]);
        } else {
            Storage::disk('local')->delete('public/guru/' . $guru->foto);
            $foto = $request->file('foto');
            $foto->storeAs('public/guru', $foto->hashName());
            $guru->update([
                'nama' => $request->nama,
                'foto' => $foto->hashName(),
                'nip' => $request->nip,
                'mapel' => $request->mapel,
            ]);
        }
        if ($guru) {
            return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect()->route('guru.index')->with(['error' => 'Data Gagal Diubah!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guru = guru::findOrFail($id);
        Storage::disk('local')->delete('public/guru/' . $guru->gambar);
        $guru->delete();
        if ($guru) {
            return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('guru.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
