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
            $table->enum("jenis_sampah", ["Organik","An Organik"]);
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
