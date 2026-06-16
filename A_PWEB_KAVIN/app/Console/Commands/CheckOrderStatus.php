<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use Carbon\Carbon;

class CheckOrderStatus extends Command
{
    protected $signature = 'order:check-status';
    protected $description = 'Otomatis update status pesanan ke Selesai jika durasi habis';

    public function handle()
    {
        $orders = Order::where('status', 'Proses Joki')
            ->whereNotNull('updated_at')
            ->get();

        foreach ($orders as $order) {
            // Hitung kapan target selesai (Waktu update + jumlah hari)
            $targetSelesai = Carbon::parse($order->updated_at)->addDays($order->estimasi_hari);

            // Kalau sekarang udah lewat dari target, ubah jadi Selesai
            if (Carbon::now()->greaterThanOrEqualTo($targetSelesai)) {
                $order->update(['status' => 'Selesai']);
                $this->info("Order {$order->invoice_number} otomatis jadi Selesai!");
            }
        }
    }
}
