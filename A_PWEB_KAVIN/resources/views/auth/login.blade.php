@extends('layouts.auth-split')

@section('title', 'Masuk - Jokss Cihuyy')

@section('content')
    <!-- Tombol Close -->
    <a href="/" class="fixed top-6 right-6 text-gray-400 hover:text-white transition text-2xl z-50">&times;</a>

    <!-- Container Login -->
    <div class="w-full max-w-md bg-[#1f2125] p-8 rounded-2xl shadow-2xl border border-gray-800">

        <h2 class="text-3xl font-black text-white mb-2">Masuk</h2>
        <p class="text-gray-400 mb-8 text-sm">Masuk dengan akun yang telah Kamu daftarkan.</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Username -->
            <div class="mb-5">
                <label for="username" class="block text-sm font-bold text-gray-300 mb-2">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus
                    class="w-full bg-[#121316] border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#5bcfe6] transition">
                @error('username')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-5 relative">
                <label for="password" class="block text-sm font-bold text-gray-300 mb-2">Kata sandi</label>
                <input type="password" id="password" name="password" placeholder="Kata sandi" required
                    class="w-full bg-[#121316] border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#5bcfe6] transition">
            </div>

            <!-- Options -->
            <div class="flex justify-between items-center mb-6">
                <div class="flex items-center gap-2">
                    <input type="checkbox" id="remember_me" name="remember" class="accent-[#5bcfe6]">
                    <label for="remember_me" class="text-xs text-gray-400 font-bold">Ingat akun ku</label>
                </div>
                <a href="{{ route('password.request') }}" class="text-xs text-[#5bcfe6] hover:underline font-bold">Lupa kata sandi?</a>
            </div>

            <!-- Tombol Masuk -->
            <button type="submit" class="w-full bg-[#5bcfe6] hover:bg-[#4ab8ce] text-black font-black py-3 rounded-xl transition hover:-translate-y-1 text-sm flex items-center justify-center gap-2">
                Masuk Sekarang
            </button>

            <p class="text-center text-xs text-gray-500 mt-6">Belum memiliki akun? <a href="{{ route('register') }}" class="text-[#5bcfe6] font-bold hover:underline">Daftar</a></p>
        </form>
    </div>
@endsection
