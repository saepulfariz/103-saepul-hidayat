<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'HIMPUNAN MAHASISWA SISTEM INFORMASI',
                'shortname' => "HIMASI",
                'logo' => 'himasi.png',
                'year' => '2021/2022',
                'visi' => '',
                'misi' => '',
                'qoute' => 'Berjuang dengan sekuat tenaga, bayaran lelah adalah hasil dari pencapaian ^_^',
                'email' => '',
                'telephone' => '',
                'instagram' => '',
                'youtube' => '',
                'website' => '',
                'address' => '',
                'description' => '',
            ],
        ];
        DB::table('organizations')->insert($data);
    }
}
