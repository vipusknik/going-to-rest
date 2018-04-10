<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccomodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rest_center_id')->unsigned();
            $table->integer('guest_count');
            $table->integer('price_per_day');
            $table->string('type');
            $table->text('description')->nullable();

            $table->foreign('rest_center_id')
              ->references('id')->on('rest_centers')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accomodations');
    }
}
