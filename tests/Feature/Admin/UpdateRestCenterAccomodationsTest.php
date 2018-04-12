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
        $this->withoutExceptionHandling();
        $accomodation = make('App\Accomodation');

        create('App\Feature', [], 30);

        $features = [];

        foreach (Feature::inRandomOrder()->get() as $feature) {
            $features[$feature->id] = array_random([ 'word', null ]);
        }

        $restCenter = RestCenter::find($accomodation->rest_center_id);

        $this->post(
                route('admin.rest-centers.accomodations.store', $restCenter),
                $accomodation->getAttributes() + [ 'features' => $features ]
            );

        $accomodation = $restCenter->fresh()->accomodations->first();

        $this->assertEquals(Feature::all()->count(), $accomodation->features->count());

        create('App\Feature', [], 20);

        $features = [];

        foreach (Feature::inRandomOrder()->get() as $feature) {
            $features[$feature->id] = array_random([ 'word', null ]);
        }

        $this->patch(
                route('admin.rest-centers.accomodations.update', [ $restCenter, $accomodation ]),
                [ 'features' => $features ] + $accomodation->getAttributes()
            );

        $this->assertEquals(30 + 20, $accomodation->fresh()->features->count());
    }

    /** @test */
    function accomodation_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $accomodation = create('App\Accomodation');

        $restCenter = $accomodation->restCenter;

        $this->patch(
                route('admin.rest-centers.accomodations.update', [ $restCenter, $accomodation ]),
                [ 'description' => 'Updated' ] + $accomodation->getAttributes()
            );

        $this->assertEquals('Updated', $accomodation->fresh()->description);
    }
}
