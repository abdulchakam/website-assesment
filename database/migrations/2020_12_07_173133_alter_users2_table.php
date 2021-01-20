<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsers2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nip')->after('id')->unique()->nullable();
            $table->string('unit_kerja')->after('username');
            $table->string('jabatan')->after('unit_kerja');
            $table->string('no_hp')->after('jabatan')->nullable();
            $table->string('instansi')->after('no_hp');
            $table->string('instansi_induk')->after('instansi');
            $table->text('alm_instansi')->after('instansi_induk');
            $table->string('telp_instansi')->after('alm_instansi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nip');
            $table->dropColumn('unit_kerja');
            $table->dropColumn('jabatan');
            $table->dropColumn('no_hp');
            $table->dropColumn('instansi');
            $table->dropColumn('instansi_induk');
            $table->dropColumn('alm_instansi');
            $table->dropColumn('telp_instansi');
        });
    }
}
