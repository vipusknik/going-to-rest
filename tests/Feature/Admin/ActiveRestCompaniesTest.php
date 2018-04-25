<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;

class ActiveRestCompaniesTest extends TestCase
{
    /** @test */
    function active_rest_companies_index_page_can_be_visited()
    {
        $this->get(route('admin.active-rest-companies.index'))->assertSuccessful();
    }

    /** @test */
    function active_rest_company_can_be_retrieved_by_slug()
    {
        $company = create('App\ActiveRestCompany');

        $this->get(route('admin.active-rest-companies.show', $company))
            ->assertJson([ 'company' => true ]);
    }
}
