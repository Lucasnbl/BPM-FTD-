<?php

namespace Database\Seeders;

use App\Models\SiteCard;
use Illuminate\Database\Seeder;

class SiteCardSeeder extends Seeder
{
    public function run(): void
    {
        $cards = [
            ['section' => 'program', 'label' => 'HMP Sistem Informasi', 'title' => 'Latihan Dasar Kepemimpinan (LDK)', 'description' => 'Program kaderisasi awal untuk mahasiswa baru guna membentuk karakter kepemimpinan dan manajerial dalam organisasi.', 'pic_name' => 'Nama PIC (Komisi I)', 'action_label' => 'Unduh Modul / Juknis'],
            ['section' => 'program', 'label' => 'HMP Teknik Industri', 'title' => 'Pekan Olahraga Mahasiswa FTD', 'description' => 'Ajang kompetisi olahraga antar program studi untuk meningkatkan solidaritas dan kebugaran jasmani mahasiswa.', 'pic_name' => 'Nama PIC (Komisi II)', 'action_label' => 'Unduh Proposal / LPJ'],
            ['section' => 'program', 'label' => 'HMP Desain Komunikasi Visual', 'title' => 'Pameran Karya Mahasiswa (Gelar Cipta)', 'description' => 'Eksibisi karya-karya terbaik mahasiswa DKV sebagai bentuk apresiasi dan unjuk gigi kepada publik.', 'pic_name' => 'Nama PIC (Komisi III)', 'action_label' => 'Lihat Modul'],
            ['section' => 'news', 'label' => 'Agenda HMP', 'title' => 'Ikuti Program Kerja HMP FTD', 'description' => 'Sejumlah kegiatan HMP dapat diikuti oleh mahasiswa FTD. Lihat daftar program kerja, informasi kegiatan, dan materi yang tersedia.', 'pic_name' => null, 'action_label' => 'Lihat program kerja'],
            ['section' => 'news', 'label' => 'Pengumuman', 'title' => 'Informasi Pendaftaran dan Jadwal', 'description' => 'Pantau kanal resmi BPM FTD dan HMP untuk mengetahui jadwal, persyaratan peserta, serta cara mendaftar kegiatan.', 'pic_name' => null, 'action_label' => 'Hubungi BPM FTD'],
            ['section' => 'news', 'label' => 'Aspirasi Mahasiswa', 'title' => 'Punya Usulan atau Pertanyaan?', 'description' => 'BPM FTD menjadi ruang representasi mahasiswa. Sampaikan aspirasi atau pertanyaan melalui kanal komunikasi resmi.', 'pic_name' => null, 'action_label' => 'Connect with Us'],
        ];

        foreach ($cards as $index => $card) {
            SiteCard::firstOrCreate(
                ['section' => $card['section'], 'sort_order' => $index + 1],
                [...$card, 'sort_order' => $index + 1],
            );
        }
    }
}
