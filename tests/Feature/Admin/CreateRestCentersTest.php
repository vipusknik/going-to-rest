<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\RestCenter;
use App\Feature;

class CreateRestCentersTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->signInAdmin();

        app(\DatabaseSeeder::class)->run();
    }

    /** @test */
    function only_admins_can_visit_rest_center_create_page()
    {
        $this->signIn();
        $this->get(route('admin.rest-centers.create'))
            ->assertStatus(403);

        $this->signInAdmin();
        $this->get(route('admin.rest-centers.create'))
            ->assertStatus(200);
    }

    /** @test */
    function rest_center_create_page_can_be_visited()
    {
        $this->get(route('admin.rest-centers.create'))
            ->assertSee('Добавление базы отдыха');
    }

    /** @test */
    function a_rest_center_requires_a_name()
    {
        $restCenter = make('App\RestCenter', [ 'name' => '' ]);

        $this->post(route('admin.rest-centers.store'), $restCenter->toArray())
            ->assertSessionHasErrors('name');
    }

    /** @test */
    function a_rest_center_requires_unique_name()
    {
        $existingName = create('App\RestCenter', [], 1)[0]->name;

        $restCenter = make('App\RestCenter', [ 'name' => $existingName ]);

        $this->post(route('admin.rest-centers.store'), $restCenter->toArray())
            ->assertSessionHasErrors('name');
    }

    /** @test */
    function a_rest_center_requires_to_be_attached_to_a_reservoir()
    {
        $restCenter = make('App\RestCenter', [ 'reservoir_id' => '' ]);

        $this->post(route('admin.rest-centers.store'), $restCenter->toArray())
            ->assertSessionHasErrors('reservoir_id');
    }

    /** @test */
    function a_rest_center_requires_to_be_attached_to_an_existing_reservoir()
    {
        $restCenter = make('App\RestCenter', [ 'reservoir_id' => 9999 ]);

        $this->post(route('admin.rest-centers.store'), $restCenter->toArray())
            ->assertSessionHasErrors('reservoir_id');
    }

    /** @test */
    function a_rest_center_requires_location()
    {
        $restCenter = make('App\RestCenter', [ 'location' => '' ]);

        $this->post(route('admin.rest-centers.store'), $restCenter->toArray())
            ->assertSessionHasErrors('location');
    }

    /** @test */
    function a_rest_center_can_be_persited()
    {
        $restCenter = make('App\RestCenter');

        $this->post(route('admin.rest-centers.store'), $restCenter->toArray());

        $this->assertEquals(1, RestCenter::all()->count());
    }

    /** @test */
    // function features_can_be_attached_to_a_rest_center()
    // {
    //     $this->withoutExceptionHandling();

    //     $restCenter = factory('App\RestCenter')->make();

    //     $features = Feature::all();

    //     $features = array_flatten($features->map(function ($feature) {
    //         return [
    //             $feature->id => array_first($feature->options)
    //         ];
    //     }));

    //     $this->post(route('admin.rest-centers.store'), $restCenter->toArray() + [ 'features' => $features ]);

    //     $this->assertNotEquals(0, RestCenter::first()->features->count());
    // }
}
