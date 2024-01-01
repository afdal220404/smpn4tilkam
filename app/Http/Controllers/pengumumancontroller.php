<?php

namespace App\Http\Controllers;

use App\Models\pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class pengumumancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengumuman = Pengumuman::orderByDesc('created_at')->get();
        return view('operator.pengumuman.index', compact('pengumuman'));
    }

    public function index2()
    {
        $pengumuman = Pengumuman::orderByDesc('created_at')->get();
        return view('viewer.pengumuman.index', compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
       return view('operator.pengumuman.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pengumuman = Pengumuman::create([
            'judul' => $request->judul,
            'teks' => $request->teks,
        ]);

        if ($pengumuman) {
            return redirect()->route('pengumuman.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('pengumuman.index')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('operator.pengumuman.show', compact('pengumuman'));
    }

    public function show2($id)
    {
        $pengumuman = Pengumuman::find($id);
        return view('viewer.pengumuman.show', compact('pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $pengumuman = Pengumuman::find($id);
    return view('operator.pengumuman.update', compact('pengumuman'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $pengumuman = Pengumuman::findOrFail($id);
            $pengumuman->update([
                'judul' => $request->judul,
                'teks' => $request->teks,
            ]);

        if ($pengumuman) {
            return redirect()->route('pengumuman.index')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect()->route('pengumuman.index')->with(['error' => 'Data Gagal Diubah!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);
        Storage::disk('local')->delete('public/pengumuman/' . $pengumuman->gambar);
        $pengumuman->delete();
        if ($pengumuman) {
            return redirect()->route('pengumuman.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('pengumuman.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
