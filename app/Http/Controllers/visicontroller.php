<?php

namespace App\Http\Controllers;

use App\Models\visi;
use Illuminate\Http\Request;

class visicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visi = visi::latest()->paginate(10);
        return view('visi.index, compact'('visi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(visi $visi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(visi $visi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, visi $visi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(visi $visi)
    {
        //
    }
}
