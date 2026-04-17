<?php

namespace Database\Seeders;

use App\Models\CatchRecord;
use Illuminate\Database\Seeder;

class CatchRecordSeeder extends Seeder
{
    public function run(): void
    {
        $lokasis = ['Perumahan', 'Pasar', 'Belakang SD', 'Kapal Kecil', 'Samping Batavia'];

        $data = [
            ['tanggal_masehi' => '2026-04-10', 'tanggal_jawa' => 12, 'lokasi_blok' => 'Perumahan',      'hasil_kg' => 3.50],
            ['tanggal_masehi' => '2026-04-10', 'tanggal_jawa' => 12, 'lokasi_blok' => 'Pasar',           'hasil_kg' => 1.75],
            ['tanggal_masehi' => '2026-04-10', 'tanggal_jawa' => 12, 'lokasi_blok' => 'Belakang SD',     'hasil_kg' => 2.20],
            ['tanggal_masehi' => '2026-04-10', 'tanggal_jawa' => 12, 'lokasi_blok' => 'Kapal Kecil',     'hasil_kg' => 4.00],
            ['tanggal_masehi' => '2026-04-10', 'tanggal_jawa' => 12, 'lokasi_blok' => 'Samping Batavia', 'hasil_kg' => 2.80],

            ['tanggal_masehi' => '2026-04-11', 'tanggal_jawa' => 13, 'lokasi_blok' => 'Perumahan',      'hasil_kg' => 2.00],
            ['tanggal_masehi' => '2026-04-11', 'tanggal_jawa' => 13, 'lokasi_blok' => 'Pasar',           'hasil_kg' => 3.25],
            ['tanggal_masehi' => '2026-04-11', 'tanggal_jawa' => 13, 'lokasi_blok' => 'Belakang SD',     'hasil_kg' => 1.50],
            ['tanggal_masehi' => '2026-04-11', 'tanggal_jawa' => 13, 'lokasi_blok' => 'Kapal Kecil',     'hasil_kg' => 5.10],
            ['tanggal_masehi' => '2026-04-11', 'tanggal_jawa' => 13, 'lokasi_blok' => 'Samping Batavia', 'hasil_kg' => 0.90],

            ['tanggal_masehi' => '2026-04-12', 'tanggal_jawa' => 14, 'lokasi_blok' => 'Perumahan',      'hasil_kg' => 4.75],
            ['tanggal_masehi' => '2026-04-12', 'tanggal_jawa' => 14, 'lokasi_blok' => 'Pasar',           'hasil_kg' => 2.60],
            ['tanggal_masehi' => '2026-04-12', 'tanggal_jawa' => 14, 'lokasi_blok' => 'Belakang SD',     'hasil_kg' => 3.00],
            ['tanggal_masehi' => '2026-04-12', 'tanggal_jawa' => 14, 'lokasi_blok' => 'Kapal Kecil',     'hasil_kg' => 1.25],
            ['tanggal_masehi' => '2026-04-12', 'tanggal_jawa' => 14, 'lokasi_blok' => 'Samping Batavia', 'hasil_kg' => 3.80],

            ['tanggal_masehi' => '2026-04-13', 'tanggal_jawa' => 15, 'lokasi_blok' => 'Perumahan',      'hasil_kg' => 1.00],
            ['tanggal_masehi' => '2026-04-13', 'tanggal_jawa' => 15, 'lokasi_blok' => 'Pasar',           'hasil_kg' => 4.50],
            ['tanggal_masehi' => '2026-04-13', 'tanggal_jawa' => 15, 'lokasi_blok' => 'Kapal Kecil',     'hasil_kg' => 2.30],
            ['tanggal_masehi' => '2026-04-13', 'tanggal_jawa' => 15, 'lokasi_blok' => 'Samping Batavia', 'hasil_kg' => 1.60],

            ['tanggal_masehi' => '2026-04-14', 'tanggal_jawa' => 16, 'lokasi_blok' => 'Perumahan',      'hasil_kg' => 6.00],
            ['tanggal_masehi' => '2026-04-14', 'tanggal_jawa' => 16, 'lokasi_blok' => 'Belakang SD',     'hasil_kg' => 2.75],
            ['tanggal_masehi' => '2026-04-14', 'tanggal_jawa' => 16, 'lokasi_blok' => 'Kapal Kecil',     'hasil_kg' => 3.40],
            ['tanggal_masehi' => '2026-04-14', 'tanggal_jawa' => 16, 'lokasi_blok' => 'Samping Batavia', 'hasil_kg' => 4.20],
        ];

        foreach ($data as $row) {
            CatchRecord::create($row);
        }
    }
}
