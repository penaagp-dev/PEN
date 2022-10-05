<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleryTable extends Migration
{
    public function up()
    {
        Schema::create('galery', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('path');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('galery');
    }
}
