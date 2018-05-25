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
        ])->assertJson([ 'model' => true ]);
    }

    /** @test */
    function activity_list_can_be_fetched()
    {
        create('App\Activity', [], 10);

        $response = $this->getJson('/admin/activities');

        $this->assertCount(10, $response->original['activities']);
    }

    /** @test */
    function an_activity_can_be_deleted()
    {
        $activity = create('App\Activity');

        $this->delete(route('admin.activities.destroy', $activity));

        $this->assertDatabaseMissing('activities', [ 'id' => $activity->id ]);
    }

    /** @test */
    function an_activity_cannot_be_deleted_if_it_is_associated_with_companies()
    {
        $company = create('App\ActiveRestCompany');
        $activity = create('App\Activity');

        $company->activities()->attach([
            $activity->id => [ 'description' => '7816254712' ]
        ]);

        $this->delete(route('admin.activities.destroy', $activity))->assertStatus(422);

        $this->assertCount(1, Activity::all());
    }

    /** @test */
    function activity_requires_a_unique_name_on_update_ignoring_itself()
    {
        $activity = create('App\Activity');

        $this->patch(route('admin.activities.update', $activity), $activity->toArray() + [ 'seasons' => [ 'winter' ] ]);

        $this->assertNull(session('errors'));
    }


    /** @test */
    function an_activity_can_be_updated()
    {
        $activity = create('App\Activity');

        $this->patch(
                route('admin.activities.update', $activity),
                [ 'name' => 'updated' ] + $activity->toArray() + [ 'seasons' => [ 'winter' ] ]
            );

        $this->assertEquals('updated', $activity->fresh()->name);
    }
}
