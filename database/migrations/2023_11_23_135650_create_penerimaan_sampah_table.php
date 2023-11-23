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
        Schema::create('penerimaan_sampah', function (Blueprint $table) {
            $table->bigIncrements("id_penerimaan_sampah");
            $table->unsignedBigInteger("id_bank_sampah");
            $table->foreign("id_bank_sampah")->references("id")->on("users");
            $table->enum("confirm", ["Terkonfirmasi","Tidak Terkonfirmasi","Belum Terkonfirmasi"])->default("Belum Terkonfirmasi");
            $table->time("jam_terima")->nullable();
            $table->date("tanggal_terima")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerimaan_sampah');
    }
};
