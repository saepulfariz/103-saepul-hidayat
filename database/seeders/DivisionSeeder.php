<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Ketua',
            ],
            [
                'name' => 'Wakil Ketua',
            ],
            [
                'name' => 'Sekretaris',
            ],
            [
                'name' => 'Bendahara',
            ],
            [
                'name' => 'Agama',
            ],
            [
                'name' => 'Komunikasi & Informasi',
            ],
            [
                'name' => 'Penelitian & Pengembangan Bakat',
            ],
            [
                'name' => 'Kewirausahaan',
            ],
            [
                'name' => 'Seni & Olahraga',
            ],
            [
                'name' => 'Humas',
            ]
        ];
        DB::table('divisions')->insert($data);
    }
}
