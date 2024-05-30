<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('candidate_models')->insert([
            [
                'name' => 'Richie Reuben Hermanto',
                'photo' => 'Richie.png',
                'description' => 'Halo saya adalah richie reuben hermanto dari jurusan imt iwjodjosedwioedjoi1e2108e0128',
                'numberOfVotes' => 120,
                'electionId' => 1
            ],
            [
                'name' => 'Ida Bagus Radhita',
                'photo' => 'Radhita.png',
                'description' => 'Halo saya adalah richie reuben hermanto dari jurusan imt iwjodjosedwioedjoi1e2108e0128',
                'numberOfVotes' => 1220,
                'electioinId' => 1
            ],
        ]);
    }
}
