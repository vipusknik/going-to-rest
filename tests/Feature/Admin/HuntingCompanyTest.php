<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;

class HuntingCompanyTest extends TestCase
{
    /** @test */
    function hunting_companies_page_index_page_can_be_visited()
    {
        $this->get(route('admin.hunting-companies.index'))->assertSuccessful();
    }

    /** @test */
    function a_hunting_company_can_be_fetched_by_slug()
    {
        $company = create('App\HuntingCompany');

        $this->get(route('admin.hunting-companies.show', $company))->assertJson([ 'model' => true ]);
    }

    /** @test */
    function a_hunting_company_can_be_deleted()
    {
        $company = create('App\HuntingCompany');

        $this->delete(route('admin.hunting-companies.destroy', $company));

        $this->assertDatabaseMissing('hunting_companies', [ 'name' => $company->name ]);
    }
}
