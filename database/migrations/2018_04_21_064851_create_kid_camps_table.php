<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKidCampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kid_camps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('contacts')->nullable();
            $table->string('email')->nullable();
            $table->string('site_link')->nullable();
            $table->string('location');
            $table->string('distribution_address')->nullable();
            $table->text('accomodation')->nullable();
            $table->text('cost')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_paid')->default(false);
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
        Schema::dropIfExists('kid_camps');
    }
}
