<?php

namespace App\Http\Controllers;

use App\Models\misi;
use Illuminate\Http\Request;

class misicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visi = misi::latest()->paginate(10);
        return view('misi.index, compact'('misi'));
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
    public function show(misi $misi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(misi $misi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, misi $misi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(misi $misi)
    {
        //
    }
}
