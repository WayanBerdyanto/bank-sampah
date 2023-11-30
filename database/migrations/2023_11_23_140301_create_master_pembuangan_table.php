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
        Schema::create('master_pembuangan', function (Blueprint $table) {
            $table->bigIncrements("id_master_pembuangan");
            $table->unsignedBigInteger("id_bank_sampah");
            $table->foreign("id_bank_sampah")->references("id")->on("users");
            $table->unsignedBigInteger("id_pengguna");
            $table->foreign("id_pengguna")->references("id")->on("users");
            $table->string("jenis_sampah", 40);
            $table->date("tgl_pengajuan");
            $table->time("jam_pengajuan");
            $table->string("status_terima")->default("menunggu");
            $table->string("methode_pembayaran", 40)->nullable();
            $table->integer("bayar")->nullable();
            $table->string("status_bayar", 40)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_pembuangan');
    }
};
