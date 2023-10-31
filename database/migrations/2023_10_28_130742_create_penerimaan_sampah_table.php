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
            $table->bigIncrements('id_penerimaan_sampah');

            $table->char('kode_penerimaan', 5);
            $table->foreign('kode_penerimaan')->references('kode_penerimaan')->on('status_penerimaan');

            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users');

            $table->unsignedBigInteger('id_dtl_pengambilan');
            $table->foreign('id_dtl_pengambilan')->references('id_dtl_pengambilan')->on('detail_pengambilan');

            $table->time('jam_terima');
            $table->date('tanggal_terima');

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
