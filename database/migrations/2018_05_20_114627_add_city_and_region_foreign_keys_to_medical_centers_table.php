<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCityAndRegionForeignKeysToMedicalCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medical_centers', function ($table) {
            $table->unsignedInteger('city_id')
                ->nullable()
                ->default(null)
                ->after('is_paid');

            $table->unsignedInteger('region_id')
                ->nullable()
                ->default(null)
                ->after('city_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
