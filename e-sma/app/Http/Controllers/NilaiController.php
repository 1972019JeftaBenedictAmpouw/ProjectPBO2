<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\User;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nilais = Nilai::all();
        $users = User::all();
        return view('addNilai', compact('nilais', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'maPel' => 'required|string|max:255',
            'nilai' => 'required|integer|between:0,100',
            'nomorInduk' => 'required|int',
            'Kelas' => 'required|int',
        ]);

        Nilai::create($request->all());

        return redirect()->route('addNilai')->with('success', 'Nilai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function indexForSiswa()
    {
        $nilais = Nilai::all();
        return view('dataNilai', compact('nilais'));
    }

    

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nilai $nilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nilai $nilai)
    {
        //
    }
}
