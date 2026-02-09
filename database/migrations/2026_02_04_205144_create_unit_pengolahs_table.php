<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unit_pengolahs', function (Blueprint $table) {
            $table->id();
            $table->string('direktorat');              // contoh: "KETALAKSANAAN"
            $table->string('kode_surat')->nullable();  // contoh: "Ks"
            $table->unsignedInteger('urutan')->default(0);

            $table->string('no_hp_1')->nullable();
            $table->string('no_hp_2')->nullable();
            $table->string('no_hp_3')->nullable();
            $table->string('no_hp_4')->nullable();

            // kolom boolean (checkbox)
            $table->boolean('bold')->default(false);
            $table->boolean('all_data')->default(false);
            $table->boolean('sekretaris')->default(false);
            $table->boolean('asisten')->default(false);
            $table->boolean('biro')->default(false);
            $table->boolean('sub_biro')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_pengolahs');
    }
};
