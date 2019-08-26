<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisbelanjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenisbelanjas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('belanja_id')->unsigned();
            $table->foreign('belanja_id')->references('id')->on('belanjas')->onDelete('cascade');
            $table->string('kode_jenbel');
            $table->string('nama_jenbel');
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
        Schema::dropIfExists('jenisbelanjas');
    }
}
