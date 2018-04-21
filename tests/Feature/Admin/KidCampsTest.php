<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;

class KidCampsTest extends TestCase
{
    /** @test */
    function kid_camps_index_page_can_be_visited()
    {
        $this->get(route('admin.kid-camps.index'))->assertSuccessful();
    }

    /** @test */
    function kid_camps_can_be_searched_by_query()
    {
        create('App\KidCamp', [ 'name' => 'Camp 1' ]);
        create('App\KidCamp', [ 'name' => 'Camp 2' ]);

        $response = $this->getJson('/admin/kid-camps?query=camp');

        $this->assertCount(2, $response->original['kidCamps']);
    }
}
