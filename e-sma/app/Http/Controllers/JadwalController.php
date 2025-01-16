<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function create()
    {
        $gurus = User::where('role', 'guru')->get(['id', 'nomorInduk', 'name']);
        return view('addJadwal', compact('gurus'));
    }

    public function dataJadwal()
    {
        $gurus = User::where('role', 'guru')->get(['id', 'nomorInduk']);
        return view('dataJadwal', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'maPel' => 'required|string|max:255',
            'waktuMapel' => 'required|date',
            'kelas' => 'required|in:10,11,12',
            'id_Guru' => [
                'required',
                function ($attribute, $value, $fail) {
                    $guru = User::where('nomorInduk', $value)->where('role', 'guru')->first();
                    if (!$guru) {
                        $fail('ID Guru tidak valid atau bukan seorang guru.');
                    }
                },
            ],
        ]);

        Jadwal::create($request->all());

        return redirect()->route('addJadwal')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function indexForSiswa()
    {
        $jadwals = Jadwal::all();
        return view('dataJadwal', compact('jadwals'));
    }

    
}
