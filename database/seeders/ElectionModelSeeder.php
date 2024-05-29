<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ElectionModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nowJakarta = Carbon::now()->setTimezone('Asia/Jakarta');

        DB::table('election_models')->insert([
            [
                'name' => 'Election 1',
                'description' => 'Description for Election 1',
                'timeStart' => $nowJakarta->copy()->setTime(8, 0, 0)->toDateTimeString(),
                'timeEnd' => $nowJakarta->copy()->setTime(17, 0, 0)->toDateTimeString(),
                'banner' => 'banner1.jpg',
            ],
            [
                'name' => 'Election 2',
                'description' => 'Description for Election 2',
                'timeStart' => $nowJakarta->copy()->setTime(9, 0, 0)->toDateTimeString(),
                'timeEnd' => $nowJakarta->copy()->setTime(18, 0, 0)->toDateTimeString(),
                'banner' => 'banner2.jpg',
            ],
            [
                'name' => 'Election 3',
                'description' => 'Description for Election 3',
                'timeStart' => $nowJakarta->copy()->setTime(10, 0, 0)->toDateTimeString(),
                'timeEnd' => $nowJakarta->copy()->setTime(19, 0, 0)->toDateTimeString(),
                'banner' => 'banner3.jpg',
            ],
        ]);
    }
}
