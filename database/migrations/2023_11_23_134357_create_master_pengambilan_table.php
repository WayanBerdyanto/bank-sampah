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
        Schema::create('master_pengambilan', function (Blueprint $table) {
            $table->bigIncrements("id_nota");

            $table->unsignedBigInteger("id_pengguna");
            $table->foreign("id_pengguna")->references("id")->on("users");
            
            $table->string("jenis_sampah", 50);
            $table->time("jam")->nullable();
            $table->string("hari",10);
            $table->date("tanggal")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_pengambilan');
    }
};
