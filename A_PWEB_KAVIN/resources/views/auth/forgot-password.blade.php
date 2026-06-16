@extends('layouts.auth-split')

@section('title', 'Lupa Kata Sandi - Jokss Cihuyy')

@section('content')
    <!-- Tombol Close -->
    <a href="{{ route('login') }}" class="fixed top-6 right-6 text-gray-400 hover:text-white transition text-2xl z-50">&times;</a>

    <!-- Container -->
    <div class="w-full max-w-md bg-[#1f2125] p-8 rounded-2xl shadow-2xl border border-gray-800 transition-colors duration-300">

        <h2 class="text-3xl font-black text-white mb-2">Lupa kata sandi?</h2>
        <p class="text-gray-400 mb-6 text-sm leading-relaxed">
            Lupa kata sandi Kamu? Tidak apa-apa. Beri tahu kami alamat email Kamu yang terdaftar dan kami akan mengirimkan tautan setel ulang kata sandi melalui email.
        </p>

        <!-- Status Message -->
        @if (session('status'))
            <div class="bg-cyan-900/30 border border-cyan-800 text-cyan-400 text-sm p-4 rounded-xl mb-6 shadow-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Input -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-bold text-gray-300 mb-2">Alamat email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan alamat email kamu" value="{{ old('email') }}" required autofocus
                    class="w-full bg-[#121316] border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#5bcfe6] transition">
                @error('email')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tombol Kirim -->
            <button type="submit" class="w-full bg-[#5bcfe6] hover:bg-[#4ab8ce] text-black font-black py-3 rounded-xl transition hover:-translate-y-1 text-sm flex items-center justify-center gap-2 mb-6">
                <i class="fa-solid fa-envelope"></i> Kirim Tautan Reset
            </button>

            <!-- Divider -->
            <div class="relative mb-6">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-700"></div></div>
                <div class="relative flex justify-center text-xs uppercase"><span class="bg-[#1f2125] px-2 text-gray-400">Atau</span></div>
            </div>

            <!-- Tombol Daftar (Secondary) -->
            <a href="{{ route('register') }}" class="w-full bg-[#121316] hover:bg-[#2d2f36] border border-gray-700 text-white font-bold py-3 rounded-xl transition text-sm flex items-center justify-center gap-2 mb-6">
                <i class="fa-solid fa-user-plus"></i> Belum punya akun? Daftar
            </a>

            <!-- Divider -->
            <div class="relative mb-6">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-700"></div></div>
                <div class="relative flex justify-center text-xs uppercase"><span class="bg-[#1f2125] px-2 text-gray-400">Lanjutkan dengan</span></div>
            </div>

            <!-- Google Login -->
            <button type="button" class="w-full bg-[#121316] border border-gray-700 hover:border-gray-600 text-white py-3 rounded-xl transition font-bold text-sm flex items-center justify-center gap-2">
                <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg" alt="Google" class="w-4 h-4"> Google
            </button>
        </form>
    </div>
@endsection
