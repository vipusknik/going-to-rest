<?php

namespace Tests\Feature;

use Tests\TestCase;

class RestCentersTest extends TestCase
{
    /** @test */
    function rest_centers_can_be_fetched_on_json_request()
    {
        $this->se();

        $this->getJson(route('rest-centers.index'))->assertJson([ 'models' => [] ]);
    }
}
