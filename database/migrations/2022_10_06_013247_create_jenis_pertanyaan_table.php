<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisPertanyaanTable extends Migration
{
    public function up()
    {
        Schema::create('jenis_pertanyaan', function (Blueprint $table) {
            $table->id();
            $table->string('jenis', 30);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jenis_pertanyaan');
    }
}
