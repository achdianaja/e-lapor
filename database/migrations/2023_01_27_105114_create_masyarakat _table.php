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
        Schema::create('masyarakat', function (Blueprint $table) {
            $table->char('nik', 16)->primary();
            $table->string('nama',35);
            $table->string('username',25)->unique();
            $table->string('alamat')->nullable();
            $table->string('email')->nullable();
            $table->string('password');
            $table->string('telp',20)->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('gender');
            $table->string('foto')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('masyarakats');
    }
};
