<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipients', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('fname')->nullable();
            $table->string('surname')->nullable();

            $table->string('country')->nullable();
            $table->string('city')->nullable();

            $table->string('pnum')->nullable();
            $table->string('pby')->nullable();
            $table->string('pdate')->nullable();

            $table->string('phone')->nullable();
            $table->string('address')->nullable();

            $table->unique(['user_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipients');
    }
}
