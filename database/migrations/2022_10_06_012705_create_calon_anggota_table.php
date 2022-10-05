<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonAnggotaTable extends Migration
{
    public function up()
    {
        Schema::create('calon_anggota', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 125);
            $table->string('panggilan', 50);
            $table->string('umur', 2);
            $table->text('alamat');
            $table->string('no_telepon', 13);
            $table->string('agama', 20);
            $table->string('email', 50);
            $table->text('foto');
            $table->string('semester', 2);
            $table->string('prodi', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calon_anggota');
    }
}
