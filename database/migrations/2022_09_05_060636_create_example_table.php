<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExampleTable extends Migration
{
    public function up()
    {
        Schema::create('example', function (Blueprint $table) {
            $table->id();
            $table->string('sample');
            $table->string('is_text');
            $table->date('date_sample');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('example');
    }
}
