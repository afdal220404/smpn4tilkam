<?php

namespace App\Http\Controllers;

use App\Models\berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class beritacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::latest('id')->paginate(10);
        return view('operator.berita.index', compact('berita'));
    }

    public function index2()
    {
        $berita = Berita::latest('id')->paginate(10);
        return view('viewer.berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('operator.berita.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $foto->storeAs('public/berita', $foto->hashName());
        $berita = Berita::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto->hashName(),
        ]);

        if ($berita) {
            return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('berita.index')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('operator.berita.show', compact('berita'));
    }

    public function show2($id)
    {
        $berita = Berita::findOrFail($id);
        return view('viewer.berita.show', compact('berita'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, berita $berita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(berita $berita)
    {
        //
    }
}
