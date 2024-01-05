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
    Schema::table('heirs', function (Blueprint $table) {
        $table->string('month')->nullable();
        $table->string('type_of_business')->nullable();
    });
}

public function down()
{
    Schema::table('heirs', function (Blueprint $table) {
        $table->dropColumn('month');
        $table->dropColumn('type_of_business');
    });
}
};