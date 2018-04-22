<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;

use App\Feature;
use App\KidCamp;

class CreateKidCampsTest extends TestCase
{
    /** @test */
    function kid_camp_create_page_can_be_visited()
    {
        $this->get(route('admin.kid-camps.create'))
            ->assertSuccessful();
    }

    /** @test */
    function a_kid_camp_requires_a_name()
    {
        $kidCamp = make('App\KidCamp', [ 'name' => '' ]);

        $this->post(
                route('admin.kid-camps.store'), $kidCamp->getAttributes()
            )->assertSessionHasErrors('name');
    }

    /** @test */
    function a_kid_camp_requires_unique_name()
    {
        $existingName = create('App\KidCamp')->name;

        $kidCamp = make('App\KidCamp', [ 'name' => $existingName ]);

        $this->post(
                route('admin.kid-camps.store'), $kidCamp->getAttributes()
            )->assertSessionHasErrors('name');
    }

    /** @test */
    function a_kid_camp_requires_location()
    {
        $camp = make('App\KidCamp', [ 'location' => '' ]);

        $this->post(
                route('admin.kid-camps.store'), $camp->getAttributes()
            )->assertSessionHasErrors('location');
    }

    /** @test */
    function a_kid_camp_can_be_persisted()
    {
        $camp = make('App\KidCamp');

        $this->post(route('admin.kid-camps.store'), $camp->getAttributes());

        $this->assertDatabaseHas('kid_camps', [ 'name' => $camp->name ]);
    }

    /** @test */
    function features_can_be_attached_to_a_kid_camp()
    {
        $camp = make('App\KidCamp');

        $feature = create(
            'App\Feature',
            [ 'belongs_to' => Feature::OF_KID_CAMP, 'category' => Feature::CATEGORY_OCCUPATIONS ]
        );

        $this->post(
            route('admin.kid-camps.store'),
            $camp->getAttributes() + [ 'features' => [ $feature->id => '' ] ]
        );

        $this->assertCount(1, KidCamp::first()->features);
    }

    /** @test */
    function social_media_can_be_attached_to_a_kid_camp()
    {
        $this->post(
            route('admin.kid-camps.store'),
            make('App\KidCamp')->getAttributes() + [ 'social_media' => [ 'VK' => 'https://link.com' ] ]
        );

        $this->assertCount(1, KidCamp::first()->social_media);
    }
}
