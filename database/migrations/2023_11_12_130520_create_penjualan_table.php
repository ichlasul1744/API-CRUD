<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama_pembeli');
            $table->string('no_hp_pembeli');
            $table->decimal('total_harga', 10, 2);
            // Tambahkan kolom lain sesuai kebutuhan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
}
