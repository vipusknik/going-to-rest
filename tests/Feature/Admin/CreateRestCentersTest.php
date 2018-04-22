<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

use App\Feature;
use App\RestCenter;

class CreateRestCentersTest extends TestCase
{
    /** @test */
    function rest_center_create_page_can_be_visited()
    {
        $this->get(route('admin.rest-centers.create'))
            ->assertSuccessful();
    }

    /** @test */
    function a_rest_center_requires_a_name()
    {
        $restCenter = make('App\RestCenter', [ 'name' => '' ]);

        $this->post(route('admin.rest-centers.store'), $restCenter->toArray())
            ->assertSessionHasErrors('name');
    }

    /** @test */
    function a_rest_center_requires_unique_name()
    {
        $existingName = create('App\RestCenter')->name;

        $restCenter = make('App\RestCenter', [ 'name' => $existingName ]);

        $this->post(route('admin.rest-centers.store'), $restCenter->toArray())
            ->assertSessionHasErrors('name');
    }

    /** @test */
    function a_rest_center_requires_to_be_attached_to_a_reservoir()
    {
        $restCenter = make('App\RestCenter', [ 'reservoir_id' => '' ]);

        $this->post(route('admin.rest-centers.store'), $restCenter->toArray())
            ->assertSessionHasErrors('reservoir_id');
    }

    /** @test */
    function a_rest_center_requires_to_be_attached_to_an_existing_reservoir()
    {
        $restCenter = make('App\RestCenter', [ 'reservoir_id' => 9999 ]);

        $this->post(route('admin.rest-centers.store'), $restCenter->toArray())
            ->assertSessionHasErrors('reservoir_id');
    }

    /** @test */
    function a_rest_center_requires_location()
    {
        $restCenter = make('App\RestCenter', [ 'location' => '' ]);

        $this->post(route('admin.rest-centers.store'), $restCenter->toArray())
            ->assertSessionHasErrors('location');
    }

    /** @test */
    function rest_center_accomodations_description_can_be_persisted()
    {
        $restCenter = make('App\RestCenter', [ 'accomodation' => 'Accomodations description' ]);

        $this->post(route('admin.rest-centers.store'), $restCenter->getAttributes());

        $this->assertEquals('Accomodations description', RestCenter::first()->accomodation);
    }

    /** @test */
    function a_rest_center_can_be_persited()
    {
        $restCenter = make('App\RestCenter');

        $this->post(route('admin.rest-centers.store'), $restCenter->getAttributes());

        $this->assertCount(1, RestCenter::all());
    }

    /** @test */
    function features_can_be_attached_to_a_rest_center()
    {
        $restCenter = make('App\RestCenter');

        $feature = create('App\Feature');

        $this->post(
                route('admin.rest-centers.store'),
                $restCenter->getAttributes() + [ 'features' => [ $feature->id => '' ] ]
            );

        $this->assertCount(1, RestCenter::first()->features);
    }

    /** @test */
    function social_media_can_be_attached_to_a_rest_center()
    {
        $restCenter = make('App\RestCenter');

        $this->post(
                route('admin.rest-centers.store'),
                [ 'social_media' => [ 'VK' => 'https://link.com', ] ] + $restCenter->getAttributes()
            );

        $this->assertCount(1, RestCenter::first()->social_media);
    }
}
