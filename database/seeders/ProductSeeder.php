<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['kode_produk'=>'AM001','nama_produk'=>'Adaptor 12V','kategori'=>'Power','satuan'=>'pcs'],
            ['kode_produk'=>'AM002','nama_produk'=>'Adaptor 9V','kategori'=>'Power','satuan'=>'pcs'],
            ['kode_produk'=>'AM003','nama_produk'=>'Kabel HDMI','kategori'=>'Kabel','satuan'=>'pcs'],
            ['kode_produk'=>'AM004','nama_produk'=>'Kabel LAN','kategori'=>'Kabel','satuan'=>'pcs'],
            ['kode_produk'=>'AM005','nama_produk'=>'Router TP-Link','kategori'=>'Network','satuan'=>'unit'],
            ['kode_produk'=>'AM006','nama_produk'=>'Switch 8 Port','kategori'=>'Network','satuan'=>'unit'],
            ['kode_produk'=>'AM007','nama_produk'=>'Power Supply CCTV','kategori'=>'CCTV','satuan'=>'pcs'],
            ['kode_produk'=>'AM008','nama_produk'=>'Camera CCTV','kategori'=>'CCTV','satuan'=>'unit'],
            ['kode_produk'=>'AM009','nama_produk'=>'Konektor RJ45','kategori'=>'Kabel','satuan'=>'pcs'],
            ['kode_produk'=>'AM010','nama_produk'=>'Splitter HDMI','kategori'=>'Aksesoris','satuan'=>'pcs'],
        ];

        Product::insert($products);
    }
}
