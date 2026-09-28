<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->string('tier', 32)->default('bph')->after('position');
        });

        DB::table('members')->where('position', 'Ketua Komisi I')->update(['tier' => 'anggaran']);
        DB::table('members')->where('position', 'Ketua Komisi II')->update(['tier' => 'kemahasiswaan']);
        DB::table('members')->whereIn('position', ['Ketua Komisi III', 'Ketua Komisi IV'])->update(['tier' => 'organisasi']);
    }

    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn('tier');
        });
    }
};
