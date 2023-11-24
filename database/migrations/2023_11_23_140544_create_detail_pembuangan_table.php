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
            $table->unsignedBigInteger("id_master_pembuangan");
            $table->foreign("id_master_pembuangan")->references("id_master_pembuangan")->on("master_pembuangan");
            $table->enum("status",["Diterima","Ditolak"]);
            $table->integer("berat_sampah");
            $table->date("tanggal");
            $table->time("jam");
            $table->string("hari",30);
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
