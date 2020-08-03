<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRastaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rastaurants', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->integer('customers');
            $table->integer('employees');
            $table->unsignedBigInteger('menu_id');
            $table->foreign('menu_id')->references('id')->on('menus');
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
        Schema::dropIfExists('rastaurants');
    }
}
