<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\User;
use App\Models\MataPelajaran;
use App\Models\Pengajar;
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
    public function create(Request $request)
    {
        $request->validate([
            'kelas' => 'required|string|max:255',
        ]);
    
        $kelas = $request->kelas;
        $mapel = session('maPel');
        $pengajars= Pengajar::where('pengajar', 'maPel')->get();
    
        if (!$mapel) {
            return redirect()->route('pilihMapel')->with('error', 'Silakan pilih mata pelajaran terlebih dahulu.');
        }
    
        session(['kelas' => $kelas]);
    
        $users = User::where('kelas', $kelas)->where('role', 'siswa')->get();
        return view('addNilai', compact('users', 'kelas', 'mapel','pengajars'));
    }

    public function pilihMapel()
    {
        $mapels = MataPelajaran::all();
        $user = auth()->user();
        $pengajars = Pengajar::where('pengajar', $user->name)->get();
        return view('pilihMapel', compact('mapels','pengajars'));
    }
    
    
    public function pilihKelas(Request $request)
    {
        $request->validate([
            'maPel' => 'required|string|max:255',
        ]);
        
        $mapel = $request->maPel;
        session(['maPel' => $mapel]);
        $user = auth()->user();
        $pengajars = Pengajar::where('pengajar', $user->name)->get();

        $kelasList = ['10', '11', '12'];
        return view('pilihKelas', compact('mapel', 'kelasList','pengajars'));
    }

    public function addNilai(Request $request)
    {
        $request->validate([
            'kelas' => 'required|string|max:255',
        ]);

        $kelas = $request->kelas;
        $mapel = session('maPel');
        $user = auth()->user();
        $pengajars = Pengajar::where('pengajar', $user->name)->get();

        if (!$mapel) {
            return redirect()->route('pilihMapel')->with('error', 'Silakan pilih mata pelajaran terlebih dahulu.');
        }

        session(['kelas' => $kelas]);

        $users = User::where('kelas', $kelas)->where('role', 'siswa')->get();
        return view('addNilai', compact('users', 'kelas', 'mapel','pengajars'));
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
