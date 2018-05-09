<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\HuntingCompany;

class CreateHuntingCompanyTest extends TestCase
{
    /** @test */
    function hunting_company_create_page_can_be_visited()
    {
        $this->get(route('admin.hunting-companies.create'))
            ->assertSuccessful();
    }

    /** @test */
    function a_hunting_company_requires_a_name()
    {
        $company = make('App\HuntingCompany', [ 'name' => '' ]);

        $this->post(
                route('admin.hunting-companies.store'), $company->getAttributes()
            )->assertSessionHasErrors('name');
    }

    /** @test */
    function a_hunting_company_requires_unique_name()
    {
        $existingName = create('App\HuntingCompany')->name;

        $company = make('App\HuntingCompany', [ 'name' => $existingName ]);

        $this->post(
                route('admin.hunting-companies.store'), $company->getAttributes()
            )->assertSessionHasErrors('name');
    }


    /** @test */
    function a_hunting_company_requires_hunting_place()
    {
        $company = make('App\HuntingCompany', [ 'hunting_place_id' => '' ]);

        $this->post(
                route('admin.hunting-companies.store'), $company->getAttributes()
            )->assertSessionHasErrors('hunting_place_id');
    }

    /** @test */
    function a_hunting_company_requires_an_existing_hunting_place()
    {
        $company = make('App\HuntingCompany', [ 'hunting_place_id' => 999 ]);

        $this->post(
                route('admin.hunting-companies.store'), $company->getAttributes()
            )->assertSessionHasErrors('hunting_place_id');
    }

    /** @test */
    function a_hunting_company_requires_hunting_region()
    {
        $company = make('App\HuntingCompany', [ 'hunting_region_id' => '' ]);

        $this->post(
                route('admin.hunting-companies.store'), $company->getAttributes()
            )->assertSessionHasErrors('hunting_region_id');
    }

    /** @test */
    function a_hunting_company_requires_an_existing_hunting_region()
    {
        $company = make('App\HuntingCompany', [ 'hunting_region_id' => 999 ]);

        $this->post(
                route('admin.hunting-companies.store'), $company->getAttributes()
            )->assertSessionHasErrors('hunting_region_id');
    }

    /** @test */
    function a_hunting_company_can_be_persisted()
    {
        $this->post(
                route('admin.hunting-companies.store'), make('App\HuntingCompany')->getAttributes()
            );

        $this->assertCount(1, HuntingCompany::all());
    }

    /** @test */
    function animals_and_fish_can_be_attached_to_a_hunting_company()
    {
        $this->se();

        $animals = [ create('App\Animal')->id => 'description' ];

        $this->post(
                route('admin.hunting-companies.store'),
                make('App\HuntingCompany')->getAttributes() + compact('animals')
            );

        // dd(HuntingCompany::first()->animals);

        $this->assertCount(1, HuntingCompany::first()->animals);
    }

    /** @test */
    function social_media_can_be_attached_to_a_hunting_company()
    {
        $this->post(
            route('admin.hunting-companies.store'),
            make('App\HuntingCompany')->getAttributes() + [ 'social_media' => [ 'VK' => 'https://vk.com/whatever' ] ]
        );

        $this->assertCount(1, HuntingCompany::first()->social_media);
    }
}
