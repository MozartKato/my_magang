<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $majors = [
            ['name' => 'Rekayasa Perangkat Lunak', 'code' => 'RPL'],
            ['name' => 'Teknik Sepeda Motor', 'code' => 'TSM'],
            ['name' => 'Teknik Kendaraan Ringan', 'code' => 'TKR'],
            ['name' => 'Teknik Permesinan Kapal', 'code' => 'TPK'],
            ['name' => 'Teknik Pengelasan', 'code' => 'TP'],
            ['name' => 'Konstruksi Kapal Baja', 'code' => 'KKB'],
            ['name' => 'Nautika Kapal Niaga', 'code' => 'NKN'],
            ['name' => 'Manajemen Logistik', 'code' => 'MANLOG'],
        ];

        Major::insert($majors);
    }
}
