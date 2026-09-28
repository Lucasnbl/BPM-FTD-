<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public const TIERS = [
        'bph' => ['label' => 'BPH', 'subtitle' => 'Badan Pengurus Harian', 'target' => 4],
        'anggaran' => ['label' => 'Komisi Anggaran', 'subtitle' => 'Pengawasan dan perencanaan anggaran', 'target' => 5],
        'kemahasiswaan' => ['label' => 'Komisi Kemahasiswaan', 'subtitle' => 'Aspirasi dan kegiatan kemahasiswaan', 'target' => 5],
        'organisasi' => ['label' => 'Komisi Organisasi', 'subtitle' => 'Pemeriksaan berkas administrasi', 'target' => 4],
    ];

    protected $fillable = [
        'name',
        'position',
        'tier',
        'photo_path',
        'sort_order',
    ];
}
