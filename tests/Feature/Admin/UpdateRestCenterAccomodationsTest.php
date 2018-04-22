<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

use App\Feature;
use App\RestCenter;

class UpdateRestCenterAccomodationsTest extends TestCase
{
    /** @test */
    function accomodation_features_can_be_updated()
    {
        $restCenter = create('App\RestCenter');

        $accomodation = create('App\Accomodation', [ 'rest_center_id' => $restCenter->id ]);

        $feature1 = create('App\Feature');

        $accomodation->attachFeatures([ $feature1->id => '' ]);

        $this->assertCount(1, $accomodation->fresh()->features);

        $feature2 = create('App\Feature');

        $this->patch(
                route('admin.rest-centers.accomodations.update', [ $restCenter, $accomodation ]),
                [ 'features' => [ $feature1->id => '', $feature2->id => '' ] ] + $accomodation->getAttributes()
            );

        $this->assertCount(2, $accomodation->fresh()->features);
    }

    /** @test */
    function accomodation_can_be_updated()
    {
        $accomodation = create('App\Accomodation');

        $restCenter = $accomodation->restCenter;

        $this->patch(
                route('admin.rest-centers.accomodations.update', [ $restCenter, $accomodation ]),
                [ 'description' => 'Updated' ] + $accomodation->getAttributes()
            );

        $this->assertEquals('Updated', $accomodation->fresh()->description);
    }
}
