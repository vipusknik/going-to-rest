<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\RestCenter;
use App\Accomodation;
use App\Feature;

class CreateRestCenterAccomodationsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->signInAdmin();
    }

    /** @test */
    function rest_center_accomodations_page_can_be_visited()
    {
        $restCenter = create('App\RestCenter');

        $this->get(route('admin.rest-centers.accomodations.index', $restCenter))->assertStatus(200);
    }

    /** @test */
    function accomodations_require_guest_count()
    {
        $restCenter = create('App\RestCenter');

        $accomodations = make('App\Accomodation', [ 'rest_center_id' => $restCenter->id, 'guest_count' => null ]);

        $this->post(route('admin.rest-centers.accomodations.store', $restCenter),$accomodations->toArray())
            ->assertSessionHasErrors('guest_count');
    }

    /** @test */
    function accomodations_require_price_per_day()
    {
        $restCenter = create('App\RestCenter');

        $accomodations = make('App\Accomodation', [ 'rest_center_id' => $restCenter->id, 'price_per_day' => null ]);

        $this->post(route('admin.rest-centers.accomodations.store', $restCenter), $accomodations->toArray())
            ->assertSessionHasErrors('price_per_day');
    }

    /** @test */
    function accomodations_require_a_type()
    {
        $restCenter = create('App\RestCenter');

        $accomodations = make('App\Accomodation', [ 'rest_center_id' => $restCenter->id, 'type' => null ]);

        $this->post(route('admin.rest-centers.accomodations.store', $restCenter), $accomodations->toArray())
            ->assertSessionHasErrors('type');
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
                $accomodation->toArray()
            );

        $this->assertEquals(1, $restCenter->accomodations->count());
    }

    /** @test */
    function features_can_be_attached_to_a_newly_created_accomodation()
    {
        $this->withoutExceptionHandling();

        $restCenter = create('App\RestCenter');

        $accomodation = make('App\Accomodation', [ 'rest_center_id' => $restCenter->id ]);

        create('App\Feature', [ 'belongs_to' => 'accomodation' ], 30);

        $features = [];

        foreach (Feature::inRandomOrder()->get() as $feature) {
            $features[$feature->id] = array_random([ 'word', null ]);
        }

        $this->post(
                route('admin.rest-centers.accomodations.store', $restCenter),
                $accomodation->toArray() + [ 'features' => $features ]
            );

        // dd($restCenter->accomodations->first()->features->count());

        $this->assertEquals(30, $restCenter->accomodations->first()->features->count());
    }
}
