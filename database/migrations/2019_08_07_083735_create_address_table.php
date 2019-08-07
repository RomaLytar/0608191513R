<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name',250);
            $table->string('Street',500);
            $table->string('House',500);
            $table->text('Additional');

            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')
                ->on('cities');

            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')
                ->on('area');

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
        Schema::dropIfExists('address');

    }
}
