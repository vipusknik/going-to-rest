<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('summer')->default(false);
            $table->boolean('winter')->default(false);
            $table->boolean('spring')->default(false);
            $table->boolean('autumn')->default(false);
        });

        Schema::create('active_rest_company_activity', function (Blueprint $table) {
            $table->unsignedInteger('active_rest_company_id');
            $table->unsignedInteger('activity_id');
            $table->integer('cost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
        Schema::dropIfExists('active_rest_company_activity');
    }
}
