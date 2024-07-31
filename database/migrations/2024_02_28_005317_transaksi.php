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
        Schema::create('transaksi',function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('id_buah');
            $table->foreign('id_buah')->references('id')->on('buah')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tgl_transaksi');
            $table->string('jumlah_beli');
            $table->string('jumlah_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
