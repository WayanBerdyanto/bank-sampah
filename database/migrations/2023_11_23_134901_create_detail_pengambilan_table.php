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
        Schema::create('detail_pengambilan', function (Blueprint $table) {
            $table->bigIncrements("id_dtl_pengambilan");

            $table->unsignedBigInteger("id_nota");
            $table->foreign("id_nota")->references("id_nota")->on("master_pengambilan");

            $table->unsignedBigInteger("id_pengambil");
            $table->foreign("id_pengambil")->references("id")->on("users");
            
            $table->integer("berat");
            $table->string("status_pengambilan",50)->default("Belum diambil");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pengambilan');
    }
};
