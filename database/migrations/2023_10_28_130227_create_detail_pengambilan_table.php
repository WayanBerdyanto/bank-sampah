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
            $table->bigIncrements('id_dtl_pengambilan');

            $table->unsignedBigInteger('id_dtl_langganan');
            $table->foreign('id_dtl_langganan')->references('id_dtl_langganan')->on('detail_langganan');

            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users');

            $table->date('tanggal');
            $table->string('hari', 12);
            $table->integer('berat');
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
