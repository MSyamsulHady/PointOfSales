<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id('id_produk');
            $table->foreignId('id_katagori');
            $table->foreign('id_katagori')->references('id_katagori')->on('katagoris')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_supplier');
            $table->foreign('id_supplier')->references('id_supplier')->on('suppliers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('nama_produk', 100)->nullable()->default('text');
            $table->string('image')->nullable();
            $table->string('harga_produk', 100)->nullable()->default('text');
            $table->string('stok_produk', 100)->nullable()->default('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
};
