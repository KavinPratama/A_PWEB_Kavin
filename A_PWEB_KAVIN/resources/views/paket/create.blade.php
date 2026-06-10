<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Paket Joki Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('paket.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="mb-4">
                                <label class="block font-medium text-sm text-gray-700">Kode Paket</label>
                                <input type="text" name="kode" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required>
                            </div>

                            <div class="mb-4">
                                <label class="block font-medium text-sm text-gray-700">Nama Paket</label>
                                <input type="text" name="nama" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required>
                            </div>

                            <div class="mb-4">
                                <label class="block font-medium text-sm text-gray-700">Kategori</label>
                                <select name="kategori" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                                    <option value="Ranked">Ranked</option>
                                    <option value="Classic">Classic</option>
                                    <option value="Brawl">Brawl</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="block font-medium text-sm text-gray-700">Sisa Slot</label>
                                <input type="number" name="stok" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required>
                            </div>

                            <div class="mb-4">
                                <label class="block font-medium text-sm text-gray-700">Harga (Rp)</label>
                                <input type="number" name="harga" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" required>
                            </div>

                            <div class="mb-4">
                                <label class="block font-medium text-sm text-gray-700">Tanggal</label>
                                <input type="date" name="tanggal" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            </div>

                            <div class="mb-4">
                                <label class="block font-medium text-sm text-gray-700">Foto Paket</label>
                                <input type="file" name="foto" class="mt-1 block w-full">
                            </div>
                        </div>

                        <div class="mt-6 flex items-center gap-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                                Simpan Paket
                            </button>
                            <a href="{{ route('paket.index') }}" class="text-gray-600 hover:underline">Batal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>