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
use Illuminate\Validation\ValidationException;
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
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi input form (Memastikan data aman & sesuai kriteria RTM)
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class], // Tambahan: Username wajib unik
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'whatsapp' => ['required', 'string', 'max:20'],                         // Tambahan: Nomor WA pembeli
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. Eksekusi simpan ke database relasional
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username, // Tambahan: Mengisi kolom username
            'email' => $request->email,
            'whatsapp' => $request->whatsapp, // Tambahan: Mengisi kolom whatsapp
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
