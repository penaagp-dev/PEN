<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberTable extends Migration
{
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('regist_number');
            $table->string('no_regist');
            $table->string('name');
            $table->string('sex');
            $table->year('start_study');
            $table->string('studi');
            $table->foreignId('generation_id')->constrained('generation');
            $table->string('status');
            $table->string('phone');
            $table->string('email');
            $table->text('img');
            $table->text('address');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('member');
    }
}
