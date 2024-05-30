<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ElectionSeeder extends Seeder
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
                'name' => 'SU IMT President ELECTION',
                'description' => 'Yuk Voting President SU IMT 2026-2027',
                'timeStart' => $nowJakarta->copy()->setTime(8, 0, 0)->toDateTimeString(),
                'timeEnd' => $nowJakarta->copy()->setTime(17, 0, 0)->toDateTimeString(),
                'banner' => '/images/banner1.jpg',
            ],
            [
                'name' => 'SU ISB President ELECTION',
                'description' => 'Yuk Voting President SU ISB 2026-2027',
                'timeStart' => $nowJakarta->copy()->setTime(9, 0, 0)->toDateTimeString(),
                'timeEnd' => $nowJakarta->copy()->setTime(18, 0, 0)->toDateTimeString(),
                'banner' => '/images/banner2.jpg',
            ],
            [
                'name' => 'SU VCD President ELECTION',
                'description' => 'Yuk Voting President SU VCD 2026-2027',
                'timeStart' => $nowJakarta->copy()->setTime(10, 0, 0)->toDateTimeString(),
                'timeEnd' => $nowJakarta->copy()->setTime(19, 0, 0)->toDateTimeString(),
                'banner' => '/images/banner3.jpg',
            ],
        ]);
    }
}
