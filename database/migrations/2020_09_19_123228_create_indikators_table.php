<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndikatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indikators', function (Blueprint $table) {
            $table->id();
            $table->string('nama_indikator')->unique();
            $table->text('ket_indikator');
            $table->foreignId('domain_id');
            $table->foreignId('aspek_id');
            $table->text('pertanyaan');
            $table->text('level0');
            $table->text('level1');
            $table->text('level2');
            $table->text('level3');
            $table->text('level4');
            $table->text('level5');
            $table->text('petunjuk');
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
        Schema::dropIfExists('indikators');
    }
}
