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
        Schema::create('pengusahas', function (Blueprint $table) {
            $table->id();
            $table->string('kd_kantor');
            $table->string('nppbkc');
            $table->string('nm_perusahaan');
            $table->string('pemilik');
            $table->string('alm_pemilik');
            $table->string('kota')->nullable();
            $table->foreignId('plant_id')->nullable()->constrained();
            $table->date('tg_nppbkc');
            $table->string('kuasa')->nullable();
            $table->string('npwp')->nullable();
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
        Schema::dropIfExists('pengusahas');
    }
};
