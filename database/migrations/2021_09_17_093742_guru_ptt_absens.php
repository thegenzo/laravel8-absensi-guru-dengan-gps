<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GuruPttAbsens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru_ptt_absens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_guru_ptt');
            $table->foreign('id_guru_ptt')->references('id')->on('guru_p_t_t_s')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('guru_ptt_absens');
    }
}
