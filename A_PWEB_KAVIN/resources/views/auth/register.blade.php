@extends('layouts.auth-split')

@section('title', 'Daftar Akun - Jokss Cihuyy')

@section('content')
    <!-- Tombol Close -->
    <a href="/" class="fixed top-6 right-6 text-gray-400 hover:text-white transition text-2xl z-50">&times;</a>

    <!-- Container Daftar -->
    <div class="w-full max-w-lg bg-[#1f2125] p-8 rounded-2xl shadow-2xl border border-gray-800 transition-colors duration-300">

        <h2 class="text-3xl font-black text-white mb-2">Daftar</h2>
        <p class="text-gray-400 mb-8 text-sm">Masukkan informasi pendaftaran yang valid.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Nama & Username (Grid 2 Kolom) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-5">
                <div>
                    <label for="name" class="block text-sm font-bold text-gray-300 mb-2">Nama lengkap</label>
                    <input type="text" id="name" name="name" placeholder="Nama lengkap" value="{{ old('name') }}" required autofocus
                        class="w-full bg-[#121316] border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#5bcfe6] transition">
                    @error('name')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="username" class="block text-sm font-bold text-gray-300 mb-2">Username</label>
                    <input type="text" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required
                        class="w-full bg-[#121316] border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#5bcfe6] transition">
                    @error('username')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Email -->
            <div class="mb-5">
                <label for="email" class="block text-sm font-bold text-gray-300 mb-2">Alamat email</label>
                <input type="email" id="email" name="email" placeholder="Alamat email" value="{{ old('email') }}" required
                    class="w-full bg-[#121316] border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#5bcfe6] transition">
                @error('email')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Whatsapp -->
            <div class="mb-5">
                <label for="whatsapp" class="block text-sm font-bold text-gray-300 mb-2">Nomor whatsapp</label>
                <div class="flex bg-[#121316] border border-gray-700 rounded-xl overflow-hidden focus-within:border-[#5bcfe6] transition">
                    <div class="px-4 py-3 bg-[#2d2f36] border-r border-gray-700 flex items-center gap-2">
                        <img src="https://flagcdn.com/w20/id.png" alt="ID">
                        <span class="text-white">+62</span>
                    </div>
                    <input type="tel" id="whatsapp" name="whatsapp" placeholder="81234567xxx" value="{{ old('whatsapp') }}" required
                        class="w-full bg-transparent px-4 py-3 text-white focus:outline-none">
                </div>
                @error('whatsapp')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password (Grid 2 Kolom) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label for="password" class="block text-sm font-bold text-gray-300 mb-2">Kata sandi</label>
                    <input type="password" id="password" name="password" placeholder="Kata sandi" required
                        class="w-full bg-[#121316] border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#5bcfe6] transition">
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-gray-300 mb-2">Konfirmasi</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi kata sandi" required
                        class="w-full bg-[#121316] border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-[#5bcfe6] transition">
                </div>
            </div>

            <!-- Terms -->
            <div class="flex items-center gap-2 mb-6">
                <input type="checkbox" id="terms" name="terms" required class="accent-[#5bcfe6]">
                <label for="terms" class="text-xs text-gray-400">Saya setuju dengan <a href="#" class="text-[#5bcfe6] hover:underline">S&K</a> dan <a href="#" class="text-[#5bcfe6] hover:underline">Privasi</a>.</label>
            </div>

            <!-- Submit -->
            <button type="submit" class="w-full bg-[#5bcfe6] hover:bg-[#4ab8ce] text-black font-black py-3 rounded-xl transition shadow-[0_0_15px_rgba(91,207,230,0.3)] hover:-translate-y-1 text-sm flex items-center justify-center gap-2">
                <i class="fa-solid fa-user-plus"></i> Daftar Akun
            </button>

            <p class="text-center text-xs text-gray-500 mt-6">Sudah memiliki akun? <a href="{{ route('login') }}" class="text-[#5bcfe6] font-bold hover:underline">Masuk</a></p>

            <!-- Divider -->
            <div class="relative my-8">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-700"></div></div>
                <div class="relative flex justify-center text-xs uppercase"><span class="bg-[#1f2125] px-2 text-gray-400">Atau lanjutkan dengan</span></div>
            </div>

            <!-- Google -->
            <button type="button" class="w-full bg-[#121316] border border-gray-700 hover:border-gray-600 text-white py-3 rounded-xl transition font-bold text-sm flex items-center justify-center gap-2">
                <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg" alt="Google" class="w-4 h-4"> Google
            </button>
        </form>
    </div>
@endsection
