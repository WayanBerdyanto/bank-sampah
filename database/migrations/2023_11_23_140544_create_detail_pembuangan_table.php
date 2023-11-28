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
        Schema::create('detail_pembuangan', function (Blueprint $table) {
            $table->bigIncrements("id_dtl_pembuangan");
            $table->unsignedBigInteger("id_master_pembuangan")->nullable();
            $table->foreign("id_master_pembuangan")->references("id_master_pembuangan")->on("master_pembuangan");
            $table->string("status", 40);
            $table->integer("berat_sampah")->nullable();
            $table->integer("harga")->nullable()->default(5000);
            $table->date("tanggal")->nullable();
            $table->time("jam_penerimaan")->nullable();
            $table->string("hari",30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembuangan');
    }
};
