<form action="{{ route('admin.order.update', $order->id) }}" method="POST" class="flex flex-col gap-2 w-full">
    @csrf
    <div class="flex gap-2 w-full">
        <select name="status" class="flex-1 bg-[#121316] border border-gray-600 rounded px-2 py-2 text-white font-bold focus:border-[#cda06b] outline-none text-sm cursor-pointer">
            <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }} class="text-yellow-500">Pending</option>
            <option value="Proses Joki" {{ $order->status == 'Proses Joki' ? 'selected' : '' }} class="text-blue-400">Proses Joki</option>
            <option value="Selesai" {{ $order->status == 'Selesai' ? 'selected' : '' }} class="text-green-400">Selesai</option>
        </select>
        <input type="number" name="estimasi_hari" value="{{ $order->estimasi_hari }}" placeholder="Hari" class="w-16 bg-[#121316] border border-gray-600 rounded px-2 py-2 text-white text-center focus:border-[#cda06b] outline-none text-sm">
    </div>
    <button type="submit" class="w-full bg-[#cda06b] hover:bg-[#b58856] text-black font-bold py-2 rounded transition text-sm shadow-lg">
        Simpan Perubahan
    </button>
</form>
