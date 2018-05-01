<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHuntingCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hunting_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->boolean('hunting')->default(true);
            $table->boolean('fishing')->default(true);
            $table->unsignedInteger('hunting_place_id');
            $table->unsignedInteger('hunting_region_id');
            $table->string('distribution_address')->nullable();
            $table->string('contacts')->nullable();
            $table->string('email')->nullable();
            $table->string('site_link')->nullable();
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
        Schema::dropIfExists('hunting_companies');
    }
}
