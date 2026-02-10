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
        Schema::create('intruksi_disposisis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('direktorat_id')->nullable()->index();
            $table->string('intruksi');
            $table->integer('urutan');
            $table->boolean('active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intruksi_disposisis');
    }
};
