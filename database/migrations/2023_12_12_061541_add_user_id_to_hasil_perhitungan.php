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
        Schema::table('hasil_perhitungan', function (Blueprint $table) {
            // Menambahkan kolom user_id
            $table->unsignedBigInteger('user_id');

            // Menambahkan foreign key constraint ke kolom user_id, merujuk pada kolom id di tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('hasil_perhitungan', function (Blueprint $table) {
            // Menghapus foreign key constraint
            $table->dropForeign(['user_id']);

            // Menghapus kolom user_id
            $table->dropColumn('user_id');
        });
    }

};
