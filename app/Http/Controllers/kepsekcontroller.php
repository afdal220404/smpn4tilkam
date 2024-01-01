<?php

namespace App\Http\Controllers;

use App\Models\kepsek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class kepsekcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kepsek = Kepsek::orderByDesc('nama')->get();
        return view('operator.kepsek.index', compact('kepsek'));
    }

    public function index2()
    {
        $kepsek = Kepsek::orderByDesc('nama')->get();
        return view('viewer.kepsek.index', compact('kepsek'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
       return view('operator.kepsek.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $foto->storeAs('public/kepsek', $foto->hashName());
        $kepsek = Kepsek::create([
            'nama' => $request->nama,
            'foto' => $foto->hashName(),
            'nip' => $request->nip,
            'teks' => $request->teks,
            
        ]);

        if ($kepsek) {
            return redirect()->route('kepsek.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('kepsek.index')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(kepsek $kepsek)
    {
        //aa
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $kepsek = Kepsek::find($id);
    return view('operator.kepsek.update', compact('kepsek'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $kepsek = Kepsek::findOrFail($id);
        if ($request->file('foto') == "") {
            $kepsek->update([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'teks' => $request->teks,
            ]);
        } else {
            Storage::disk('local')->delete('public/kepsek/' . $kepsek->foto);
            $foto = $request->file('foto');
            $foto->storeAs('public/kepsek', $foto->hashName());
            $kepsek->update([
                'nama' => $request->nama,
                'foto' => $foto->hashName(),
                'nip' => $request->nip,
                'teks' => $request->teks,
            ]);
        }
        if ($kepsek) {
            return redirect()->route('kepsek.index')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect()->route('kepsek.index')->with(['error' => 'Data Gagal Diubah!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kepsek = Kepsek::findOrFail($id);
        Storage::disk('local')->delete('public/kepsek/' . $kepsek->foto);
        $kepsek->delete();
        if ($kepsek) {
            return redirect()->route('kepsek.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('kepsek.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
