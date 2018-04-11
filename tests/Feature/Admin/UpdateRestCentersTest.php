<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Feature;
use App\RestCenter;

class UpdateRestCentersTest extends TestCase
{
    /** @test */
    function rest_center_edit_page_can_be_visited()
    {
        $restCenter = create('App\RestCenter');

        $this->get(route('admin.rest-centers.edit', $restCenter))->assertStatus(200)->assertSee($restCenter->name);
    }

    /** @test */
    function rest_center_edit_page_is_available_to_admins_only()
    {
        $restCenter = create('App\RestCenter');

        $this->signIn();
        $this->get(route('admin.rest-centers.edit', $restCenter))->assertStatus(403);

        $this->signInAdmin();
        $this->get(route('admin.rest-centers.edit', $restCenter))->assertStatus(200);
    }

    /** @test */
    function rest_center_name_has_to_be_unique_on_update()
    {
        $restCenter = create('App\RestCenter');

        $anotherRestCenter = create('App\RestCenter');

        $this->patch(
                route('admin.rest-centers.update', $anotherRestCenter),
                [ 'name' => $restCenter->name ] + $anotherRestCenter->toArray()
            )
            ->assertSessionHasErrors('name');
    }

    /** @test */
    function rest_center_name_has_to_be_unique_on_update_ignoring_the_rest_center_itself()
    {
        $restCenter = create('App\RestCenter');

        $this->patch(route('admin.rest-centers.update', $restCenter), $restCenter->toArray());
        $this->assertNull(session('errors'));
    }

    /** @test */
    function a_rest_center_name_can_be_updated()
    {
        $restCenter = create('App\RestCenter');

        $this->patch(
                route('admin.rest-centers.update', $restCenter),
                [ 'name' => 'updated' ] + $restCenter->toArray()
            );

        $this->assertEquals('updated', $restCenter->fresh()->name);
    }

    /** @test */
    function rest_center_features_can_be_updated()
    {
        $restCenter = make('App\RestCenter');

        create('App\Feature', [], 30);

        $features = [];

        foreach (Feature::inRandomOrder()->get() as $feature) {
            $features[$feature->id] = array_random([ 'word', null ]);
        }

        $this->post(route('admin.rest-centers.store'), $restCenter->toArray() + [ 'features' => $features ]);

        $restCenter = RestCenter::first();

        $this->assertEquals(Feature::all()->count(), $restCenter->features->count());

        create('App\Feature', [], 20);

        $features = [];

        foreach (Feature::inRandomOrder()->get() as $feature) {
            $features[$feature->id] = array_random([ 'word', null ]);
        }

        $this->patch(
                route('admin.rest-centers.update', $restCenter),
                [ 'features' => $features ] + $restCenter->toArray()
            );

        $this->assertEquals(30 + 20, $restCenter->fresh()->features->count());
    }
}
