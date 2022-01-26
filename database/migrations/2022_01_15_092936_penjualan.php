<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Penjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->constrained('barang');
            $table->decimal('jumlah');
            $table->timestamps();
            //             Nama	Tipe Data	Panjang	Key
            //          Id	Integer		PK
            //          id_customer	integer		FK
            //          tanggal	Datetime		

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
}
