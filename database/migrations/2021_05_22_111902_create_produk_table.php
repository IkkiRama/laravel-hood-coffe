<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->integer('kategori_id');
            $table->string('nama_produk', 255)->unique();

            $table->integer('harga_produk');
            $table->integer('berat_produk');

            $table->integer('stok_produk');
            $table->string('foto_produk', 255);

            $table->text('deskripsi_produk', 1000);
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
        Schema::dropIfExists('produk');
    }
}
