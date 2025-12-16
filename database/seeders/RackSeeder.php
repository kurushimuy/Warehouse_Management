<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rack;

class RackSeeder extends Seeder
{
    public function run(): void
    {
        $racks = [];

        foreach (['A', 'B', 'C'] as $row) {
            for ($i = 1; $i <= 6; $i++) {
                $racks[] = [
                    'kode_rak' => $row . $i,
                    'lokasi' => 'Gudang Utama',
                    'kapasitas' => 100,
                ];
            }
        }

        Rack::insert($racks);
    }
}
