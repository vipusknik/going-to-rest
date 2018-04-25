<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\ActiveRestCompany;

class CreateActiveRestCompaniesTest extends TestCase
{
    /** @test */
    function active_rest_company_create_page_can_be_visted()
    {
        $this->get(route('admin.active-rest-companies.create'))
            ->assertSuccessful();
    }

    /** @test */
    function active_rest_company_requires_a_name()
    {
        $activeRestCompany = make('App\ActiveRestCompany', [ 'name' => '' ]);

        $this->post(
                route('admin.active-rest-companies.store'), $activeRestCompany->getAttributes()
            )->assertSessionHasErrors('name');
    }

    /** @test */
    function active_rest_company_requires_a_unique_name()
    {
        $activeRestCompany = create('App\ActiveRestCompany');

        $this->post(
            route('admin.active-rest-companies.store'),
            make('App\ActiveRestCompany', [ 'name' => $activeRestCompany->name ])->getAttributes()
        )->assertSessionHasErrors('name');
    }

    /** @test */
    function active_rest_company_requires_a_location()
    {
        $activeRestCompany = make('App\ActiveRestCompany', [ 'location' => '' ]);

        $this->post(
                route('admin.active-rest-companies.store'), $activeRestCompany->getAttributes()
            )->assertSessionHasErrors('location');
    }

    /** @test */
    function active_rest_company_requires_at_least_one_activity()
    {
        $activeRestCompany = make('App\ActiveRestCompany');

        $this->post(
                route('admin.active-rest-companies.store'), $activeRestCompany->getAttributes() + [ 'activities' => [] ]
            )->assertSessionHasErrors('activities');
    }

    /** @test */
    function active_rest_company_can_be_persisted()
    {
        $activeRestCompany = make('App\ActiveRestCompany');

        $this->post(
            route('admin.active-rest-companies.store'),
            $activeRestCompany->getAttributes() + [ 'activities' => [ create('App\Activity')->id => '123000' ] ]
        );

        $this->assertDatabaseHas('active_rest_companies', [ 'name' => $activeRestCompany['name'] ]);
    }

    /** @test */
    function active_rest_company_activity_requires_cost()
    {
        $activities = [ create('App\Activity', [])->id => '' ];

        $this->post(
            route('admin.active-rest-companies.store'),
            make('App\ActiveRestCompany')->getAttributes() + compact('activities')
        )->assertSessionHasErrors('activities.1');
    }

    /** @test */
    function activities_can_be_attached_to_an_active_rest_company()
    {
        $activities = [ create('App\Activity', [])->id => '123000' ];

        $this->post(
            route('admin.active-rest-companies.store'),
            make('App\ActiveRestCompany')->getAttributes() + compact('activities')
        );

        $this->assertCount(1, ActiveRestCompany::first()->activities);
    }

    /** @test */
    function social_media_can_be_attached_to_an_active_rest_company()
    {
        $this->post(
            route('admin.active-rest-companies.store'),
            make('App\ActiveRestCompany')->getAttributes()
            + [ 'social_media' => [ 'VK' => 'https://link.com' ] ]
            + [ 'activities' => [ create('App\Activity')->id => '123000' ] ]
        );

        $this->assertCount(1, ActiveRestCompany::first()->social_media);
    }
}
