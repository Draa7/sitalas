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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('active')->default(true);
            $table->timestamp('last_login')->nullable();
            $table->string('tlsk')->nullable();
            $table->unsignedBigInteger('direktorat_id')->nullable()->index();
            $table->string('file_ttd')->nullable();
            $table->string('sopd')->nullable();
            $table->string('no_hp', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'active',
                'last_login',
                'tlsk',
                'direktorat_id',
                'file_ttd',
                'sopd',
                'no_hp',
            ]);
        });
    }
};
