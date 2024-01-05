<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilPerhitunganTable extends Migration
{
    public function up()
    {
        Schema::create('hasil_perhitungan', function (Blueprint $table) {
            $table->id();
            $table->json('hasil_perhitungan')->nullable();
            $table->json('total_harta')->nullable();
            $table->json('hasil_data')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hasil_perhitungan');
    }
}

