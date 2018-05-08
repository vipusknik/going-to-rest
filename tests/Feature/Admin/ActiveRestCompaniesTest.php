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
            ->assertJson([ 'model' => true ]);
    }

    /** @test */
    function active_rest_company_can_be_deleted()
    {
        $company = create('App\ActiveRestCompany');

        $this->delete(route('admin.active-rest-companies.destroy', $company));

        $this->assertDatabaseMissing('active_rest_companies', [ 'id' => $company->id ]);
    }

    /** @test */
    function active_rest_companies_can_be_searched_by_query()
    {
        create('App\ActiveRestCompany', [ 'name' => 'Company 1' ]);
        create('App\ActiveRestCompany', [ 'name' => 'Company 2' ]);
        create('App\ActiveRestCompany', [ 'name' => 'Organization 3' ]);

        $response = $this->getJson('/admin/active-rest-companies?query=company');

        $this->assertCount(2, $response->original['models']);
    }
}
