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
        Schema::create('pengambil_sampah', function (Blueprint $table) {
            $table->bigIncrements('id_pengambilsampah');
            $table->string('username', 40)->unique();
            $table->string('email', 40);
            $table->string('password', 80);
            $table->string('role', 30)->default('pengambilsampah');
            $table->string('nama_lengkap', 50)->nullable();
            $table->string('provinsi', 50)->nullable();
            $table->string('kabupaten', 50)->nullable();
            $table->string('kecamatan', 50)->nullable();
            $table->string('kelurahan', 50)->nullable();
            $table->string('no_telpon', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengambil_sampah');
    }
};
