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
        Schema::create('detail_langganan', function (Blueprint $table) {
            $table->id("id_dtl_langganan");
            
            $table->unsignedBigInteger("id_pengguna")->nullable();
            $table->foreign("id_pengguna")->references("id")->on("users");

            $table->char("kode_langganan",5)->nullable();
            $table->foreign("kode_langganan")->references("kode_langganan")->on("langganan");
            $table->integer("harga")->nullable();
            $table->date("masa_langganan")->nullable();
            $table->string("methode_pembayaran", 50)->nullable();
            $table->enum("status",["Sudah Bayar","Belum Bayar"]);
            $table->date("tanggal")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_langganan');
    }
};
