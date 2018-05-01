<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\HuntingRegion;

class HuntingRegionsTest extends TestCase
{
    /** @test */
    function a_hunting_region_requires_a_name()
    {
        $this->post(route('admin.hunting-regions.store', [ 'name' => '' ]))->assertSessionHasErrors('name');
    }

    /** @test */
    function a_hunting_region_requires_a_unique_name()
    {
        Huntingregion::create([ 'name' => 'region 13' ]);

        $this->post(route('admin.hunting-regions.store', [ 'name' => 'region 13' ]))->assertSessionHasErrors('name');
    }

    /** @test */
    function a_hunting_region_can_be_persisted()
    {
        $this->post(route('admin.hunting-regions.store', [ 'name' => 'region 13' ]));

        $this->assertCount(1, HuntingRegion::all());
    }

    /** @test */
    function hunting_region_is_returned_in_response_after_persisting()
    {
        $this->post(route('admin.hunting-regions.store', [ 'name' => 'region 13' ]))->assertJson([ 'region' => true ]);
    }

    /** @test */
    function a_hunting_region_can_be_deleted()
    {
        $region = HuntingRegion::create([ 'name' => 'region 13' ]);

        $this->delete(route('admin.hunting-regions.destroy', $region));

        $this->assertCount(0, HuntingRegion::all());
    }

    /** @test */
    function hunting_region_cannot_be_deleted_if_it_is_associated_with_companies()
    {
        $company = create('App\HuntingCompany');

        $this->delete(route('admin.hunting-regions.destroy', $company->hunting_region_id))->assertStatus(422);

        $this->assertCount(1, HuntingRegion::all());
    }
}
