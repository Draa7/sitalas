<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pengarahs', function (Blueprint $table) {
            $table->id();

            // Jejak asal (1 penerima hanya bisa 1 pengarah)
            $table->foreignId('penerima_id')
                ->unique()
                ->constrained('penerimas')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // salinan data dari penerima (boleh diedit di tahap pengarah)
            $table->date('tanggal_terima');
            $table->date('tanggal_surat');
            $table->integer('no_urut');
            $table->string('no_surat');
            $table->integer('banyak_surat');

            $table->foreignId('direktorat_id')->constrained('unit_pengolahs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('kode_id')->constrained('kode_surats')->cascadeOnUpdate()->cascadeOnDelete();

            $table->string('pengirim');
            $table->string('perihal');
            $table->string('kontak_person');
            $table->foreignId('sifat_surat_id')->constrained('sifat_surats')->cascadeOnUpdate()->cascadeOnDelete();

            $table->text('ringkasan_poko');
            $table->text('catatan');
            $table->string('file_upload');
            $table->string('no_box');
            $table->string('no_rak');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengarahs');
    }
};