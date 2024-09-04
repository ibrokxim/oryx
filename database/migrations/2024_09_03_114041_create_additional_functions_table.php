<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalFunctionsTable extends Migration
{

    public function up()
    {
        Schema::create('additional_functions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->text('text');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('additional_functions');
    }
}
