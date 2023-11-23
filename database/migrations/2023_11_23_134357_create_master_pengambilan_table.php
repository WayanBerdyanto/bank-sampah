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
            
            $table->enum("jenis_sampah", ["Organik","An Organik"]);
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
