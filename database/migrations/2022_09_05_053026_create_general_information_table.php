<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralInformationTable extends Migration
{
    public function up()
    {
        Schema::create('general_information', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('since');
            $table->string('parent');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('general_information');
    }
}
