<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryPositionTable extends Migration
{

    public function up()
    {
        Schema::create('history_position', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member')->constrained('member');
            $table->string('position');
            $table->text('description');
            $table->string('start_end');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('history_position');
    }
}
