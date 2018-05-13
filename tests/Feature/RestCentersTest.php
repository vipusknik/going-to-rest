<?php

namespace Tests\Feature;

use Tests\TestCase;

class RestCentersTest extends TestCase
{
    /** @test */
    function rest_centers_can_be_fetched_on_json_request()
    {
        $this->getJson(route('rest-centers.index'))->assertJson([ 'models' => [] ]);
    }

    /** @test */
    function rest_centers_can_be_searched_by_name()
    {
        create('App\RestCenter', [ 'name' => 'batman' ]);
        create('App\RestCenter', [ 'name' => 'batgirl' ]);
        create('App\RestCenter', [ 'name' => 'robin' ]);

        $response = $this->getJson(route('rest-centers.index') . '?query=bat');

        $this->assertCount(2, $response->original['models']);
    }

    /** @test */
    function rest_centers_can_be_searched_by_reservoir()
    {
        create('App\RestCenter', [ 'reservoir_id' => '1' ]);
        create('App\RestCenter', [ 'reservoir_id' => '1' ]);
        create('App\RestCenter', [ 'reservoir_id' => '3' ]);

        $response = $this->getJson(route('rest-centers.index') . '?reservoir=1');

        $this->assertCount(2, $response->original['models']);
    }

    /** @test */
    function rest_centers_can_be_searched_by_guest_count()
    {
        // fill
    }

    /** @test */
    function rest_centers_can_be_searched_by_accomodation_price()
    {
        // fill
    }

    /** @test */
    function rest_centers_can_be_searched_by_accomodation_type()
    {
        // fill
    }

    /** @test */
    function rest_centers_can_be_searched_by_accomodation_food()
    {
        // fill
    }
}
