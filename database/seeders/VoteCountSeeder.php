<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoteCountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vote_counts')->insert([
            [
                'electionId' => 1,
                'voteTime' => '08:30:00',
                'userId' => 1,
            ],
            [
                'electionId' => 3,
                'voteTime' => now(),
                'userId' => 1,
            ],
            [
                'electionId' => 2,
                'voteTime' => '10:00:00',
                'userId' => 1,
            ],
            // Tambahkan data lain sesuai kebutuhan
        ]);
    }
}
