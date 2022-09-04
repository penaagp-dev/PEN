<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenerationTable extends Migration
{
    public function up()
    {
        Schema::create('generation', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->year('years');
            $table->date('graduated');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('generation');
    }
}
