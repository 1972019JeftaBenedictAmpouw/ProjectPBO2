<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\User;
use App\Models\MataPelajaran;
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
        $mapels = MataPelajaran::all();
        return view('addNilai', compact('nilais', 'users','mapels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'maPel' => 'required|string|max:255',
            'Kelas' => 'required|string|max:255',
            'nilai' => 'required|array',
        ]);

        $data = [];
        foreach ($request->nilai as $nomorInduk => $nilai) {
            $data[] = [
                'maPel' => $request->maPel,
                'Kelas' => $request->Kelas,
                'nomorInduk' => $nomorInduk,
                'nilai' => $nilai,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Nilai::insert($data);

        return redirect()->route('addNilai')->with('success', 'Nilai berhasil ditambahkan untuk semua siswa.');
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
