<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;

class UpdateActiveRestCompaniesTest extends TestCase
{
    /** @test */
    function active_rest_edit_page_can_be_visited()
    {
        $this->se();
        $company = create('App\ActiveRestCompany');

        $this->get(route('admin.active-rest-companies.edit', $company))
            ->assertSuccessful();
    }

    /** @test */
    function active_rest_company_requires_a_unique_name_on_update()
    {
        $company = create('App\ActiveRestCompany');

        $this->patch(
                route('admin.active-rest-companies.update', $company),
                [ 'name' => create('App\ActiveRestCompany')->name ] + $company->getAttributes()
            )->assertSessionHasErrors('name');
    }

    /** @test */
    function active_rest_company_requires_a_unique_name_on_update_ignoring_itself()
    {
        $company = create('App\ActiveRestCompany');

        $this->patch(
                route('admin.active-rest-companies.update', $company),
                $company->getAttributes() + [ 'activities' => [ create('App\Activity')->id => 123 ] ]
            );

        $this->assertNull(session('errors'));
    }

    /** @test */
    function active_rest_company_activities_can_be_updated()
    {
        $this->se();

        $company = create('App\ActiveRestCompany');

        $company->activities()
            ->attach([
                create('App\Activity')->id => [ 'description' => '123000' ]
            ]);

        $this->assertCount(1, $company->activities);

        $activities = [
            create('App\Activity')->id => 12347368,
            create('App\Activity')->id => 734584,
        ];

        $this->patch(
                route('admin.active-rest-companies.update', $company),
                $company->getAttributes() + compact('activities')
            );

        $this->assertCount(2, $company->fresh()->activities);
    }
}
