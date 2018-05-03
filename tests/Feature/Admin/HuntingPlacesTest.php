<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\HuntingPlace;

class HuntingPlacesTest extends TestCase
{
    /** @test */
    function a_hunting_place_requires_a_name()
    {
        $this->post(route('admin.hunting-places.store', [ 'name' => '' ]))->assertSessionHasErrors('name');
    }

    /** @test */
    function a_hunting_place_requires_a_unique_name()
    {
        HuntingPlace::create([ 'name' => 'place 13' ]);

        $this->post(route('admin.hunting-places.store', [ 'name' => 'place 13' ]))->assertSessionHasErrors('name');
    }

    /** @test */
    function a_hunting_place_can_be_persisted()
    {
        $this->post(route('admin.hunting-places.store', [ 'name' => 'place 13' ]));

        $this->assertCount(1, HuntingPlace::all());
    }

    /** @test */
    function hunting_place_is_returned_in_response_after_persisting()
    {
        $this->post(route('admin.hunting-places.store', [ 'name' => 'place 13' ]))->assertJson([ 'place' => true ]);
    }

    /** @test */
    function a_hunting_place_can_be_deleted()
    {
        $place = HuntingPlace::create([ 'name' => 'place 13' ]);

        $this->delete(route('admin.hunting-places.destroy', $place));

        $this->assertCount(0, HuntingPlace::all());
    }

    /** @test */
    function hunting_place_cannot_be_deleted_if_it_is_associated_with_companies()
    {
        $company = create('App\HuntingCompany');

        $this->delete(route('admin.hunting-places.destroy', $company->hunting_place_id))->assertStatus(422);

        $this->assertCount(1, HuntingPlace::all());
    }

    /** @test */
    function hunting_place_can_be_updated()
    {
        $place = HuntingPlace::create([ 'name' => 'place 13' ]);

        $this->patch(
                route('admin.hunting-places.update', $place),
                [ 'name' => 'updated' ] + $place->getAttributes()
            );

        $this->assertEquals('updated', HuntingPlace::first()->name);
    }
}
