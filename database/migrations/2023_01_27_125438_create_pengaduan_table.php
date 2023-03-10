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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id('id_pengaduan');
            $table->dateTime('tgl_pengaduan');
            $table->char('nik',16);
            $table->string('judul_laporan');
            $table->text('isi_laporan');
            $table->unsignedBigInteger('id_categories');
            // $table->string('foto');
            $table->string('report_main_image')->nullable();
            $table->string('lokasi_kejadian')->nullable();
            $table->enum('status', ['0','proses','selesai']);
            $table->string('hide_identitas')->default('1');
            $table->string('hide_laporan')->default('1');
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('masyarakat');
            
            // $table->foreign('id_categories')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduans');
    }
};
