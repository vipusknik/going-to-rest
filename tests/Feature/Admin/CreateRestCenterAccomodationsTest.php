<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

use App\RestCenter;
use App\Accomodation;
use App\Feature;

class CreateRestCenterAccomodationsTest extends TestCase
{
    /** @test */
    function rest_center_accomodations_page_can_be_visited()
    {
        $restCenter = create('App\RestCenter');

        $this->get(
                route('admin.rest-centers.accomodations.index', $restCenter)
            )->assertSuccessful();
    }

    /** @test */
    function accomodations_require_guest_count()
    {
        $restCenter = create('App\RestCenter');

        $accomodation = make(
                'App\Accomodation',
                [ 'rest_center_id' => $restCenter->id, 'guest_count' => null ]
            );

        $this->post(
                route('admin.rest-centers.accomodations.store', $restCenter), $accomodation->toArray()
            )->assertSessionHasErrors('guest_count');
    }

    /** @test */
    function guest_count_has_to_be_an_integer()
    {
        $restCenter = create('App\RestCenter');

        $accomodations = make(
                'App\Accomodation',
                [ 'rest_center_id' => $restCenter->id, 'guest_count' => 'string' ]
            );

        $this->post(
                route('admin.rest-centers.accomodations.store', $restCenter), $accomodations->toArray()
            )->assertSessionHasErrors('guest_count');
    }

    /** @test */
    function guest_count_has_to_be_in_integer_range()
    {
        $restCenter = create('App\RestCenter');

        $accomodations = make('App\Accomodation', [ 'rest_center_id' => $restCenter->id, 'guest_count' => 162476219847 ]);

        $this->post(
                route('admin.rest-centers.accomodations.store', $restCenter), $accomodations->toArray()
            )->assertSessionHasErrors('guest_count');
    }

    /** @test */
    function accomodations_require_price_per_day()
    {
        $restCenter = create('App\RestCenter');

        $accomodations = make('App\Accomodation', [ 'rest_center_id' => $restCenter->id, 'price_per_day' => null ]);

        $this->post(
                route('admin.rest-centers.accomodations.store', $restCenter), $accomodations->toArray()
            )->assertSessionHasErrors('price_per_day');
    }

    /** @test */
    function accomodations_require_a_type()
    {
        $restCenter = create('App\RestCenter');

        $accomodations = make('App\Accomodation', [ 'rest_center_id' => $restCenter->id, 'type' => null ]);

        $this->post(
                route('admin.rest-centers.accomodations.store', $restCenter), $accomodations->toArray()
            )->assertSessionHasErrors('type');
    }

    /** @test */
    function accomodations_requires_a_valid_accomodation_type()
    {
        $restCenter = create('App\RestCenter');

        $accomodations = make('App\Accomodation', [ 'rest_center_id' => $restCenter->id, 'type' => 'wrong_type' ]);

        $this->post(route('admin.rest-centers.accomodations.store', $restCenter), $accomodations->toArray())
            ->assertSessionHasErrors('type');
    }

    /** @test */
    function accomodation_can_be_attached_to_a_rest_center()
    {
        $restCenter = create('App\RestCenter');

        $accomodation = make('App\Accomodation', [ 'rest_center_id' => $restCenter->id ]);

        $this->post(
                route('admin.rest-centers.accomodations.store', $restCenter),
                $accomodation->getAttributes()
            );

        $this->assertCount(1, $restCenter->accomodations);
    }

    /** @test */
    function features_can_be_attached_to_a_newly_created_accomodation()
    {
        $restCenter = create('App\RestCenter');

        $accomodation = make('App\Accomodation', [ 'rest_center_id' => $restCenter->id ]);

        $feature = create('App\Feature', [ 'belongs_to' => 'accomodation' ]);

        $this->post(
                route('admin.rest-centers.accomodations.store', $restCenter),
                $accomodation->getAttributes() + [ 'features' => [ $feature->id => '' ] ]
            );

        $this->assertCount(1, $restCenter->accomodations->first()->features);
    }
}
