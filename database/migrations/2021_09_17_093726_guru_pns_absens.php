<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GuruPnsAbsens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru_pns_absens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_guru_pns');
            $table->foreign('id_guru_pns')->references('id')->on('guru_p_n_s')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->date('tgl');
            $table->time('jam_masuk')->nullable();
            $table->time('jam_keluar')->nullable();
            $table->time('jam_kerja')->nullable();
            $table->string('lokasi_absen')->nullable();
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
        Schema::dropIfExists('guru_pns_absens');
    }
}
