<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_cards', function (Blueprint $table) {
            $table->id();
            $table->string('section', 20)->index();
            $table->string('label', 120);
            $table->string('title', 200);
            $table->text('description');
            $table->string('pic_name', 120)->nullable();
            $table->string('action_label', 120)->nullable();
            $table->string('action_url', 2048)->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_cards');
    }
};
