<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\VisiController;
use App\Http\Controllers\MisiController;

class visimisicontroller extends Controller
{
    public function index()
    {
        return view('guru.index', compact('guru'));
    }

    public function visimisi()
    {
        $dataVisi = app(VisiController::class)->index()->getData(); // Mengambil data dari VisiController
        $dataMisi = app(MisiController::class)->index()->getData(); // Mengambil data dari MisiController

        return view('operator\visimisi', compact('dataVisi', 'dataMisi'));
    }

}
