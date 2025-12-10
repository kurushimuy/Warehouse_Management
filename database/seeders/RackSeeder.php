<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rack;

class RackSeeder extends Seeder
{
    public function run(): void
    {
        $racks = [];

        foreach (['A','B','C'] as $huruf) {
            for ($i=1; $i<=6; $i++) {
                $racks[] = [
                    'kode_rak' => $huruf . $i,
                    'lokasi'   => 'Gudang ' . $huruf,
                    'kapasitas' => 100,
                ];
            }
        }

        foreach ($racks as $r) {
            Rack::create($r);
        }
    }
}
