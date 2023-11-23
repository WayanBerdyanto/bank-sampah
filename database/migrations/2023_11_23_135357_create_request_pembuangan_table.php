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
        Schema::create('request_pembuangan', function (Blueprint $table) {
            $table->bigIncrements("id_request");
            $table->unsignedBigInteger("id_dtl_pengambilan");
            $table->foreign("id_dtl_pengambilan")->references("id_dtl_pengambilan")->on("detail_pengambilan");
            $table->enum("status",["Diterima","Ditolak"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_pembuangan');
    }
};
