<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcelAdditionalFunctionTable extends Migration
{

    public function up()
    {
        Schema::create('parcel_additional_function', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parcel_id');
            $table->unsignedBigInteger('additional_function_id');
            $table->timestamps();

            $table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('cascade');
            $table->foreign('additional_function_id')->references('id')->on('additional_functions')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('parcel_additional_function');
    }
}
