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
                'vision' => 'Mewujudkan Himpunan Mahasiswa Informatika yang inovatif, inklusif, dan kolaboratif, dengan semangat untuk menciptakan lingkungan akademis yang mendukung pengembangan potensi diri dan profesionalisme di bidang teknologi informasi.',
                'mission' => 'Inovasi dalam Pendidikan dan Teknologi, Peningkatan Kualitas Layanan dan Fasilitas, Pengembangan Karir dan Profesionalisme.',
                'voteCount' => '15',
                'profilePicture' => '/images/bryan.JPG',
                'electionId' => 1,
            ],
            [
                'name' => 'Rafi Abhista Naya',
                'vision' => 'Mewujudkan SU IMT yang bisa mengalahkan SU lainya dengan adil dan kompetitif.',
                'mission' => 'Pembinaan Kemampuan Soft Skills, Kebersamaan dan Kepedulian Sosial,Inklusi dan Keberagaman',
                'voteCount' => '16',
                'profilePicture' => '/images/rafi.JPG',
                'electionId' => 1,
            ],[
                'name' => 'Yobel Nathaniel',
                'vision' => 'Mewujudkan Himpunan Mahasiswa Informatika yang inovatif, inklusif, dan kolaboratif, dengan semangat untuk menciptakan lingkungan akademis yang mendukung pengembangan potensi diri dan profesionalisme di bidang teknologi informasi.',
                'mission' => 'Inovasi dalam Pendidikan dan Teknologi, Peningkatan Kualitas Layanan dan Fasilitas, Pengembangan Karir dan Profesionalisme.',
                'voteCount' => '15',
                'profilePicture' => '/images/yobel.JPG',
                'electionId' => 2,
            ],
            [
                'name' => 'Derrend Hansen',
                'vision' => 'Mewujudkan SU IMT yang bisa mengalahkan SU lainya dengan adil dan kompetitif.',
                'mission' => 'Pembinaan Kemampuan Soft Skills, Kebersamaan dan Kepedulian Sosial,Inklusi dan Keberagaman',
                'voteCount' => '16',
                'profilePicture' => '/images/derrend.JPG',
                'electionId' => 2,
            ],
            [
                'name' => 'Willas Tobing',
                'vision' => 'Mewujudkan Himpunan Mahasiswa Informatika yang inovatif, inklusif, dan kolaboratif, dengan semangat untuk menciptakan lingkungan akademis yang mendukung pengembangan potensi diri dan profesionalisme di bidang teknologi informasi.',
                'mission' => 'Inovasi dalam Pendidikan dan Teknologi, Peningkatan Kualitas Layanan dan Fasilitas, Pengembangan Karir dan Profesionalisme.',
                'voteCount' => '15',
                'profilePicture' => '/images/wilas.JPG',
                'electionId' => 3,
            ],
            [
                'name' => 'Nathan Darell',
                'vision' => 'Mewujudkan SU IMT yang bisa mengalahkan SU lainya dengan adil dan kompetitif.',
                'mission' => 'Pembinaan Kemampuan Soft Skills, Kebersamaan dan Kepedulian Sosial,Inklusi dan Keberagaman',
                'voteCount' => '16',
                'profilePicture' => '/images/nathan.JPG',
                'electionId' => 3,
            ],

        ]);
    }
}