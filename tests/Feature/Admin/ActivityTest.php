<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Activity;

class ActivityTest extends TestCase
{
    /** @test */
    function activity_requires_a_name()
    {
        $this->post(route('admin.activities.store'), [
            'name' => '',
            'seasons' => []
        ])->assertSessionHasErrors('name');
    }

    /** @test */
    function activity_requires_a_unique_name()
    {
        $this->post(route('admin.activities.store'), [
            'name' => create('App\Activity')->name,
            'seasons' => []
        ])->assertSessionHasErrors('name');
    }

    /** @test */
    function activity_requires_at_least_one_season()
    {
        $this->post(route('admin.activities.store'), [
            'name' => 'random name',
            'seasons' => []
        ])->assertSessionHasErrors('seasons.0');
    }

    /** @test */
    function activity_can_be_persisted()
    {
        $this->post(route('admin.activities.store'), [
            'name' => 'random name',
            'seasons' => [ 'autumn', 'summer' ]
        ]);

        $this->assertCount(1, Activity::all());
    }

    /** @test */
    function a_newly_created_activity_is_returned_in_json_response()
    {
        $this->post(route('admin.activities.store'), [
            'name' => 'random name',
            'seasons' => [ 'autumn', 'summer' ]
        ])->assertJson([ 'activity' => true ]);
    }
}
