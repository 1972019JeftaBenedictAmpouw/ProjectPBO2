<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'Kelas' => ['required', 'int', 'max:255'],
            'nomorInduk' => ['required', 'int'],
            'namaWali' => ['required', 'string', 'max:255'],
            'noTelpon' => ['required', 'string', 'max:255'],
            'Alamat' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'Kelas' => $request->Kelas,
            'nomorInduk' => $request->nomorInduk,
            'namaWali' => $request->namaWali,
            'noTelpon' => $request->noTelpon,
            'Alamat' => $request->Alamat,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect(route('register', absolute: false));
    }
}
