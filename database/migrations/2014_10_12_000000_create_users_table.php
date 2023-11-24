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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username', 40)->unique();
            $table->string('email', 40);
            $table->string('password', 80);
            $table->enum('role',['pengguna', 'pengambil', 'banksampah'])->default('pengguna');
            $table->string('nama_lengkap', 50)->nullable();
            $table->string('status_langganan', 100)->default('Belum berlangganan')->nullable();
            $table->string('foto', 100)->nullable();
            $table->string('provinsi', 50)->nullable();
            $table->string('kabupaten', 50)->nullable();
            $table->string('kecamatan', 50)->nullable();
            $table->string('kelurahan', 50)->nullable();
            $table->string('no_telpon', 15);
            $table->string('latitude', 40)->nullable();
            $table->string('longitude', 40)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
