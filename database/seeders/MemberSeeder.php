<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        if (Member::query()->exists()) {
            return;
        }

        $members = [
            ['bph', 'Ketua Umum', 'Nama Lengkap 1'],
            ['bph', 'Wakil Ketua', 'Nama Lengkap 2'],
            ['bph', 'Sekretaris Jenderal', 'Nama Lengkap 3'],
            ['bph', 'Bendahara', 'Nama Lengkap 4'],
            ['anggaran', 'Ketua Komisi Anggaran', 'Nama Lengkap 5'],
            ['kemahasiswaan', 'Ketua Komisi Kemahasiswaan', 'Nama Lengkap 6'],
            ['organisasi', 'Ketua Komisi Organisasi', 'Nama Lengkap 7'],
            ['organisasi', 'Anggota Komisi Organisasi', 'Nama Lengkap 8'],
        ];

        $tierOrders = [];
        foreach ($members as [$tier, $position, $name]) {
            $tierOrders[$tier] = ($tierOrders[$tier] ?? 0) + 1;
            Member::create([
                'tier' => $tier,
                'name' => $name,
                'position' => $position,
                'sort_order' => $tierOrders[$tier],
            ]);
        }
    }
}
