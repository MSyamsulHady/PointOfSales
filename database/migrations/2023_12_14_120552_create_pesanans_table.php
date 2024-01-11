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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->foreignId('id_user');
            $table->foreignId('id_pembayaran');
            $table->foreignId('id_kurir');
            $table->foreignId('id_produk');
            $table->enum('status', ['selesai', 'ditolak', 'pending']);
            $table->date('tanggal_pesanan');
            $table->double('jumlah_pesanan');
            $table->double('jumlah_bayar');
            $table->foreign('id_user')->references('id_user')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_pembayaran')->references('id_pembayaran')->on('pembayarans')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_kurir')->references('id_kurir')->on('kurirs')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('id_produk')->references('id_produk')->on('produks')->cascadeOnUpdate()->cascadeOnDelete();


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
        Schema::dropIfExists('pesanans');
    }
};
