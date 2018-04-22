<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class RestCenterAccomodationsTest extends TestCase
{
    /** @test */
    function accomodation_can_be_detached_from_a_rest_center()
    {
        $restCenter = create('App\RestCenter');

        $accomodation = make('App\Accomodation', [ 'rest_center_id' => $restCenter->id ]);

        $this->post(
                route('admin.rest-centers.accomodations.store', $restCenter),
                $accomodation->getAttributes() + [ 'features' => [] ]
            );

        $this->assertCount(1, $restCenter->accomodations);

        $attachedAccomodation = $restCenter->accomodations->first();
        $this->delete(route('admin.rest-centers.accomodations.destroy', [ $restCenter, $attachedAccomodation ]));
        $this->assertCount(0, $restCenter->fresh()->accomodations);
    }
}
