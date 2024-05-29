<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElectionModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('election_models')->insert([
            [
                'name' => 'Election 1',
                'description' => 'Description for Election 1',
                'timeStart' => '08:00:00',
                'timeEnd' => '17:00:00',
                'banner' => 'banner1.jpg',
            ],
            [
                'name' => 'Election 2',
                'description' => 'Description for Election 2',
                'timeStart' => '09:00:00',
                'timeEnd' => '18:00:00',
                'banner' => 'banner2.jpg',
            ],
            [
                'name' => 'Election 3',
                'description' => 'Description for Election 3',
                'timeStart' => '10:00:00',
                'timeEnd' => '19:00:00',
                'banner' => 'banner3.jpg',
            ],
        ]);
    }
}
