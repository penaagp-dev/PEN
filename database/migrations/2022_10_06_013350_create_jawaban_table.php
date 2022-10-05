<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanTable extends Migration
{
    public function up()
    {
        Schema::create('jawaban', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jenis')->constrained('jenis_pertanyaan');
            $table->foreignId('id_ca')->constrained('calon_anggota');
            $table->text('jawaban');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jawaban');
    }
}
