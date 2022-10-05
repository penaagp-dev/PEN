<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaanTable extends Migration
{
    public function up()
    {
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jenis')->constrained('jenis_pertanyaan');
            $table->text('pertanyaan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pertanyaan');
    }
}
