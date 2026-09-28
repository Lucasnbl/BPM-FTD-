<?php

namespace Database\Seeders;

use App\Models\HomeContent;
use Illuminate\Database\Seeder;

class HomeContentSeeder extends Seeder
{
    public function run(): void
    {
        HomeContent::firstOrCreate([], [
            'hero_label' => 'Badan Perwakilan Mahasiswa',
            'hero_title' => 'BPM FTD',
            'hero_description' => 'Mewujudkan representasi mahasiswa yang transparan, aspiratif, dan inovatif demi kemajuan Fakultas. Bersinergi bersama membangun pergerakan yang nyata.',
            'profile_intro' => 'Mari berkenalan dengan para pengurus Badan Perwakilan Mahasiswa Fakultas Teknologi dan Desain yang siap mewujudkan aspirasi Anda.',
        ]);
    }
}
