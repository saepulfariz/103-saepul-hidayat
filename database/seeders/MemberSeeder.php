<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'divisi_id' => 1,
                'user_id' => 1,
                'coordinator' => 1,
            ],
            [
                'divisi_id' => 2,
                'user_id' => 2,
                'coordinator' => 0,
            ],
            [
                'divisi_id' => 3,
                'user_id' => 3,
                'coordinator' => 1,
            ],
        ];
        DB::table('members')->insert($data);
    }
}
