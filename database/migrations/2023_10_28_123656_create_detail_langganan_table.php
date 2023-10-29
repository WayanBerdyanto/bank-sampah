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
            $table->bigIncrements('id_dtl_langganan');
            $table->unsignedBigInteger('id_pengguna');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna');

            $table->char('kode_langganan', 5);
            $table->foreign('kode_langganan')->references('kode_langganan')->on('langganan');
            $table->date('tanggal_langganan');
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
