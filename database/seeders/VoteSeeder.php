<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nowJakarta = Carbon::now()->setTimezone('Asia/Jakarta');

        DB::table('vote_models')->insert([
            [
                'electionId' => 1,
                'voteTime' => $nowJakarta,
                'userId' => 1,
            ],
            [
                'electionId' => 3,
                'voteTime' => $nowJakarta,
                'userId' => 1,
            ],
            [
                'electionId' => 2,
                'voteTime' => $nowJakarta,
                'userId' => 1,
            ],
            // Tambahkan data lain sesuai kebutuhan
        ]);
    }
}
