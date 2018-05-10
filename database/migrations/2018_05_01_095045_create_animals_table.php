<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('type');
            $table->boolean('summer')->default(false);
            $table->boolean('winter')->default(false);
            $table->boolean('spring')->default(false);
            $table->boolean('autumn')->default(false);
        });

        Schema::create('hunting_company_animal', function (Blueprint $table) {
            $table->unsignedInteger('hunting_company_id');
            $table->unsignedInteger('animal_id');
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
        Schema::dropIfExists('hunting_company_animal');
    }
}
