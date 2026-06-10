<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Paket Joki') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="container layout-wrapper">
                        <div class="card" style="width: 100%; overflow-x: auto;">
                            
                            <div style="background-color: #e0e7ff; border: 1px solid #c7d2fe; border-radius: 8px; padding: 16px; margin-bottom: 24px; color: #333; display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 15px;">
                                <div>
                                    <h3 style="font-size: 1.125rem; font-weight: bold; color: #4338ca; margin-bottom: 8px; margin-top: 0;">🛒 Keranjang & Info Sesi</h3>
                                    <p style="font-size: 0.875rem; color: #4b5563; margin-bottom: 8px; margin-top: 0;">
                                        Kamu telah membuka halaman ini sebanyak <b>{{ $visitCount ?? 0 }} kali</b>.<br>
                                        Kunjungan pertama: {{ $firstVisit ?? '-' }} <br>
                                        Kunjungan terakhir: {{ $lastVisit ?? '-' }}
                                    </p>
                                    
                                    <div style="margin-top: 12px;">
                                        <strong style="font-size: 0.875rem;">Isi Keranjang (Session):</strong>
                                        @if(isset($keranjang) && count($keranjang) > 0)
                                            <ul style="list-style-type: disc; padding-left: 20px; font-size: 0.875rem; margin-top: 4px; color: #374151;">
                                                @foreach($keranjang as $item)
                                                    <li>{{ $item['nama'] }} - Rp {{ number_format($item['harga'], 0, ',', '.') }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p style="font-size: 0.875rem; color: #6b7280; font-style: italic; margin-top: 4px;">Keranjang masih kosong.</p>
                                        @endif
                                    </div>
                                </div>

                                <form action="{{ route('paket.reset') }}" method="POST" style="margin: 0;">
                                    @csrf
                                    <button type="submit" onclick="return confirm('Yakin ingin mereset sesi dan keranjang?')" style="background-color: #ef4444; color: white; font-size: 0.875rem; font-weight: 600; padding: 8px 16px; border-radius: 4px; border: none; cursor: pointer;">
                                        Reset Hitungan & Keranjang
                                    </button>
                                </form>
                            </div>
                            <h3 style="margin-top: 0; margin-bottom: 15px; color: #e94560;">Daftar Paket Joki</h3>
                            
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; flex-wrap: wrap; gap: 10px;">
                                <a href="{{ route('paket.create') }}" class="btn-order" style="text-decoration: none; padding: 8px 12px; background-color: #e94560; color: white; border-radius: 5px;">+ Tambah Paket</a>
                                
                                <input type="text" id="search-input" placeholder="Cari paket (Live Search)..." style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 5px; width: 100%; max-width: 250px;">
                            </div>

                            @if(session('success'))
                                <div style="padding: 10px; background: #28a745; color: white; margin-bottom: 15px; border-radius: 5px;">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <table style="width: 100%; border-collapse: collapse; text-align: left; color: #333;">
                                <thead>
                                    <tr style="border-bottom: 2px solid #ddd; background-color: #f8f9fa;">
                                        <th style="padding: 12px 10px;">Kode</th>
                                        <th style="padding: 12px 10px;">Nama Paket</th>
                                        <th style="padding: 12px 10px;">Kategori</th>
                                        <th style="padding: 12px 10px;">Sisa Slot</th>
                                        <th style="padding: 12px 10px;">Harga</th>
                                        <th style="padding: 12px 10px;">Tanggal</th>
                                        <th style="padding: 12px 10px;">Foto</th> 
                                        <th style="padding: 12px 10px; text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    @forelse($paketJoki as $paket)
                                        <tr style="border-bottom: 1px solid #eee;">
                                            <td style="padding: 10px;">{{ $paket->kode }}</td>
                                            <td style="padding: 10px;">{{ $paket->nama }}</td>
                                            <td style="padding: 10px;">{{ $paket->kategori }}</td>
                                            <td style="padding: 10px;">{{ $paket->stok }}</td>
                                            <td style="padding: 10px;">Rp {{ number_format($paket->harga, 0, ',', '.') }}</td>
                                            <td style="padding: 10px;">{{ $paket->tanggal ? \Carbon\Carbon::parse($paket->tanggal)->format('d/m/Y') : '-' }}</td>
                                            <td style="padding: 10px;">
                                                @if($paket->foto)
                                                    <img src="{{ asset('storage/' . $paket->foto) }}" width="50" height="50" style="object-fit: cover; border-radius: 5px;">
                                                @else
                                                    <span style="color: #999; font-size: 0.8em;">No Image</span>
                                                @endif
                                            </td>
                                            <td style="padding: 10px; text-align: center;">
                                                
                                                <form action="{{ route('paket.cart', $paket->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" style="padding: 5px 10px; background: #10b981; color: white; border: none; border-radius: 4px; cursor: pointer; margin-right: 5px;">+ Keranjang</button>
                                                </form>

                                                <a href="{{ route('paket.edit', $paket->id) }}" class="btn-edit-tbl" style="text-decoration: none; padding: 5px 10px; background: orange; color: black; border-radius: 4px; margin-right: 5px;">Edit</a>
                                                
                                                <form action="{{ route('paket.destroy', $paket->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin mau hapus paket ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-delete-tbl" style="padding: 5px 10px; background: red; color: white; border: none; border-radius: 4px; cursor: pointer;">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" style="text-align: center; padding: 20px; color: #666;">Belum ada paket joki.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <div style="margin-top: 20px;">
                                {{ $paketJoki->links() }}
                            </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('js/livesearch.js') }}"></script>
</x-app-layout>