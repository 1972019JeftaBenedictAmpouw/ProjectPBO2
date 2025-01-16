<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use App\Models\Pengajar;
use App\Models\User;

class PengajarController extends Controller
{
    public function create()
    {
        $mapels = MataPelajaran::all();
        $pengajars = User::where('role', 'guru')->get();
        $kelasList = ['10', '11', '12'];
        return view('addPengajar', compact('mapels','pengajars','kelasList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'maPel' => 'required|string|max:255',
            'pengajar' => 'required|string|max:255',
            'Kelas' => 'required|string|max:255',
        ]);
        Pengajar::create($request->only(['maPel',  'pengajar', 'Kelas']));
    

        return redirect()->route('addPengajar')->with('success', 'Pengajar berhasil disimpan!');
    }
}

