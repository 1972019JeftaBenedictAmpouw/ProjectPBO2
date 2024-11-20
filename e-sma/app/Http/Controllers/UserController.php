<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }
    public function dataSiswa()
    {
        $users = User::where('role', 'siswa')->paginate(10);

        return view('dataSiswa', compact('users'));
    }
    public function dataGuru()
    {
        $users = User::where('role', 'guru')->paginate(10);

        return view('dataGuru', compact('users'));
    }

    public function edit(User $user)
    {
        return view('editData', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);
    
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
    
        return redirect()->route('editData', $user->id)->with('success', 'Data pengguna berhasil diperbarui.');
    }
    
}
