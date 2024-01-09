<?php

namespace App\Http\Controllers;

use App\Models\visi;
use App\Models\misi;
use App\Models\tujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class visimisicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visi = Visi::orderByDesc('visi')->get();
        $misi = Misi::orderByDesc('misi')->get();
        $tujuan = Tujuan::orderByDesc('created_at')->get();
        return view('operator.visimisi.index', compact('visi','misi','tujuan'));
    }

    public function index2()
    {
        $visi = Visi::orderByDesc('visi')->get();
        $misi = Misi::orderByDesc('misi')->get();
        $tujuan = Tujuan::orderByDesc('created_at')->get();
        return view('viewer.visimisi', compact('visi','misi','tujuan'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function createvisi(Request $request)
    {
       return view('operator.visimisi.tambahvisi');
    }

    public function createmisi(Request $request)
    {
       return view('operator.visimisi.tambahmisi');
    }

    public function createtujuan(Request $request)
    {
       return view('operator.visimisi.tambahtujuan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storevisi(Request $request)
    {
        $visi = Visi::create([
            'visi' => $request->visi,
        ]);

        if ($visi) {
            return redirect()->route('visimisi.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('visimisi.index')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    public function storemisi(Request $request)
    {
        $misi = Misi::create([
            'misi' => $request->misi,
        ]);

        if ($misi) {
            return redirect()->route('visimisi.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('visimisi.index')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    public function storetujuan(Request $request)
    {
        $tujuan = Tujuan::create([
            'tujuan' => $request->tujuan,
        ]);

        if ($tujuan) {
            return redirect()->route('visimisi.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('visimisi.index')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editvisi($id)
{
    $visi = Visi::find($id);
    return view('operator.visimisi.updatevisi', compact('visi'));
}

public function editmisi($id)
{
    $visi = Visi::find($id);
    return view('operator.visimisi.updatemisi', compact('misi'));
}

public function edittujuan($id)
{
    $visi = Visi::find($id);
    return view('operator.visimisi.updatetujuan', compact('tujuan'));
}


    /**
     * Update the specified resource in storage.
     */
    public function updatevisi(Request $request, $id)
    {
        
        $visi = Visi::findOrFail($id);
            $visi->update([
                'visi' => $request->visi,
            ]);

        if ($visi) {
            return redirect()->route('visimisi.index')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect()->route('visimisi.index')->with(['error' => 'Data Gagal Diubah!']);
        }
    }

    public function updatemisi(Request $request, $id)
    {
        
        $misi = Misi::findOrFail($id);
            $misi->update([
                'misi' => $request->misi,
            ]);

        if ($misi) {
            return redirect()->route('visimisi.index')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect()->route('visimisi.index')->with(['error' => 'Data Gagal Diubah!']);
        }
    }

    public function updatetujuan(Request $request, $id)
    {
        
        $tujuan = Tujuan::findOrFail($id);
            $tujuan->update([
                'tujuan' => $request->tujuan,
            ]);

        if ($tujuan) {
            return redirect()->route('visimisi.index')->with(['success' => 'Data Berhasil Diubah!']);
        } else {
            return redirect()->route('visimisi.index')->with(['error' => 'Data Gagal Diubah!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyvisi($id)
    {
        $visi = Visi::findOrFail($id);
        $visi->delete();
        if ($visi) {
            return redirect()->route('visimisi.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('visimisi.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

    public function destroymisi($id)
    {
        $misi = Misi::findOrFail($id);
        $misi->delete();
        if ($misi) {
            return redirect()->route('visimisi.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('visimisi.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

    public function destroytujuan($id)
    {
        $tujuan = Tujuan::findOrFail($id);
        $tujuan->delete();
        if ($tujuan) {
            return redirect()->route('visimisi.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('visimisi.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
