<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;

class UpdateHuntingCompaniesTest extends TestCase
{
    /** @test */
    function hunting_company_update_page_can_be_visited()
    {
        $company = create('App\HuntingCompany');

        $this->get(route('admin.hunting-companies.edit', $company))->assertSuccessful();
    }

    /** @test */
    function hunting_company_name_has_to_be_unique_ignoring_itself()
    {
        $company = create('App\HuntingCompany');

        $this->patch(route('admin.hunting-companies.update', $company), $company->getAttributes());

        $this->assertNull(session('errors'));
    }

    /** @test */
    function hunting_company_name_can_be_updated()
    {
        $company = create('App\HuntingCompany');

        $this->patch(
            route('admin.hunting-companies.update', $company),
            [ 'name' => 'updated' ] + $company->getAttributes()
        );

        $this->assertEquals('updated', $company->fresh()->name);
    }

    /** @test */
    function hunting_company_social_media_can_be_updated()
    {
        $company = create('App\HuntingCompany')
            ->attachSocialMedia([
                'instagram' => 'http://instagram.com',
                'facebook' => 'http://facebook.com'
            ]);

        $this->assertCount(2, $company->fresh()->social_media);

        $this->patch(
            route('admin.hunting-companies.update', $company),
            [ 'social_media' => [ 'instagram' => 'https://instagram.com' ] ] + $company->getAttributes()
        );

        $this->assertCount(1, $company->fresh()->social_media);
    }

    /** @test */
    function hunting_company_animals_can_be_updated()
    {
        $this->se();

        $company = create('App\HuntingCompany');

        $company->animals()
            ->attach([
                create('App\Animal')->id => [ 'description' => '' ],
                create('App\Animal')->id => [ 'description' => '' ]
            ]);

        $this->assertCount(2, $company->fresh()->animals);

        $animals = [ create('App\Animal')->id => '' ];

        $this->patch(
            route('admin.hunting-companies.update', $company), compact('animals') + $company->getAttributes()
        );

        $this->assertCount(1, $company->fresh()->animals);
    }
}
