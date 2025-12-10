<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['kode_produk' => 'EL001', 'nama_produk' => 'Adaptor 12V 2A', 'kategori' => 'Adaptor', 'satuan' => 'pcs'],
            ['kode_produk' => 'EL002', 'nama_produk' => 'Adaptor 5V 2A', 'kategori' => 'Adaptor', 'satuan' => 'pcs'],
            ['kode_produk' => 'EL003', 'nama_produk' => 'Kabel HDMI 1.5m', 'kategori' => 'Kabel', 'satuan' => 'pcs'],
            ['kode_produk' => 'EL004', 'nama_produk' => 'Kabel HDMI 3m', 'kategori' => 'Kabel', 'satuan' => 'pcs'],
            ['kode_produk' => 'EL005', 'nama_produk' => 'Kabel LAN Cat6', 'kategori' => 'Kabel', 'satuan' => 'pcs'],
            ['kode_produk' => 'EL006', 'nama_produk' => 'Stop Kontak 6 Lubang', 'kategori' => 'Elektronik', 'satuan' => 'pcs'],
            ['kode_produk' => 'EL007', 'nama_produk' => 'Terminal Listrik', 'kategori' => 'Elektronik', 'satuan' => 'pcs'],
            ['kode_produk' => 'EL008', 'nama_produk' => 'Lampu LED 12W', 'kategori' => 'Lampu', 'satuan' => 'pcs'],
            ['kode_produk' => 'EL009', 'nama_produk' => 'Lampu LED 15W', 'kategori' => 'Lampu', 'satuan' => 'pcs'],
            ['kode_produk' => 'EL010', 'nama_produk' => 'Kipas USB Mini', 'kategori' => 'Elektronik', 'satuan' => 'pcs'],
        ];

        foreach ($products as $p) {
            Product::create($p);
        }
    }
}
