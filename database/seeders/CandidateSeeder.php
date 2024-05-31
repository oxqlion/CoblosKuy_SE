<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
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
                'name' => 'Bryan Samuel',
                'vision' => 'Mewujudkan Himpunan Mahasiswa Informatika yang inovatif.',
                'mission' => 'Inovasi dalam Pendidikan dan Teknologi, Peningkatan Kualitas Layanan dan Fasilitas, dan Profesionalisme.',
                'voteCount' => '15',
                'profilePicture' => 'bryan.JPG',
                'electionId' => 1,
            ],
            [
                'name' => 'Rafi Abhista Naya',
                'vision' => 'Mewujudkan SU IMT yang bisa mengalahkan SU lainya dengan adil dan kompetitif.',
                'mission' => 'Pembinaan Kemampuan Soft Skills, Kebersamaan dan Kepedulian Sosial,Inklusi dan Keberagaman',
                'voteCount' => '16',
                'profilePicture' => 'rafi.JPG',
                'electionId' => 1,
            ],[
                'name' => 'Yobel Nathaniel',
                'vision' => 'Mewujudkan Himpunan Mahasiswa Informatika yang inovatif, inklusif, dan kolaboratif.',
                'mission' => 'Inovasi dalam Pendidikan dan Teknologi, Peningkatan Kualitas Layanan dan Fasilitas dan Profesionalisme.',
                'voteCount' => '15',
                'profilePicture' => 'yobel.JPG',
                'electionId' => 2,
            ],
            [
                'name' => 'Derrend Hansen',
                'vision' => 'Mewujudkan SU IMT yang bisa mengalahkan SU lainya dengan adil dan kompetitif.',
                'mission' => 'Pembinaan Kemampuan Soft Skills, Kebersamaan dan Kepedulian Sosial,Inklusi dan Keberagaman',
                'voteCount' => '16',
                'profilePicture' => 'derrend.JPG',
                'electionId' => 2,
            ],
            [
                'name' => 'Willas Tobing',
                'vision' => 'Mewujudkan Himpunan Mahasiswa Informatika yang inovatif, inklusif, dan kolaboratif',
                'mission' => 'Inovasi dalam Pendidikan dan Teknologi, Peningkatan Kualitas Layanan dan Fasilitas dan Profesionalisme.',
                'voteCount' => '0',
                'profilePicture' => 'wilas.JPG',
                'electionId' => 3,
            ],
            [
                'name' => 'Nathan Darell',
                'vision' => 'Mewujudkan SU IMT yang bisa mengalahkan SU lainya dengan adil dan kompetitif.',
                'mission' => 'Pembinaan Kemampuan Soft Skills, Kebersamaan dan Kepedulian Sosial,Inklusi dan Keberagaman',
                'voteCount' => '0',
                'profilePicture' => 'nathan.JPG',
                'electionId' => 3,
            ],

        ]);
    }
}
