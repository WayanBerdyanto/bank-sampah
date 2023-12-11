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
        Schema::create('langganan', function (Blueprint $table) {
            $table->char("kode_langganan", 5)->primary();
            $table->string("nama_langganan", 50)->nullable();
            $table->string("layanan", 100)->nullable();
            $table->integer("lama_langganan")->nullable();
            $table->string("desc", 50)->nullable();
            $table->integer("harga")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('langganan');
    }
};
