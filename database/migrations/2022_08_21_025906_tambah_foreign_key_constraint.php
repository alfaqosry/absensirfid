<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahForeignKeyConstraint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksis', function($table) {
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('restrict')->onUpdate('restrict');
        });

        Schema::table('transaksis', function($table) {
            $table->foreign('barang_id')
                  ->references('id')->on('barangs')
                  ->onDelete('restrict')->onUpdate('restrict');
        });

        Schema::table('barangs', function($table) {
            $table->foreign('kategori_id')
                  ->references('id')->on('kategoris')
                  ->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
