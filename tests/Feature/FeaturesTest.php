<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeaturesTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->signInAdmin();

    }
    /** @test */
    public function only_admins_are_allowed_to_create_new_features()
    {
        $this->signIn();

        $feature = make('App\Feature');

        $this->post(route('admin.features.store'), $feature->toArray())
            ->assertStatus(403);

        $this->signInAdmin();

        $this->post(route('admin.features.store'), $feature->toArray())
            ->assertStatus(200);
    }

    /** @test */
    function a_new_feature_requires_a_name()
    {
        $feature = make('App\Feature', ['name' => '']);

        $this->post(route('admin.features.store'), $feature->toArray())
            ->assertSessionHasErrors('name');
    }

    /** @test */
    function feature_name_has_to_be_unique_by_belongs_to_attribute()
    {
        $restCenterFeature = make('App\Feature', ['name' => 'Купание', 'belongs_to' => 'rest_center']);
        $this->post(route('admin.features.store'), $restCenterFeature->toArray())
            ->assertStatus(200);

        $this->post(route('admin.features.store'), $restCenterFeature->toArray())
            ->assertSessionHasErrors('name');

        $accomodationFeature = make('App\Feature', ['name' => 'Купание', 'belongs_to' => 'accomodation']);
        $this->post(route('admin.features.store'), $accomodationFeature->toArray())
            ->assertStatus(200);
    }

    /** @test */
    function a_new_feature_requires_a_category()
    {
        $feature = make('App\Feature', ['category' => '']);

        $this->post(route('admin.features.store'), $feature->toArray())
            ->assertSessionHasErrors('category');
    }

    /** @test */
    function a_new_feature_requires_a_belongs_to_attribute()
    {
        // $this->withoutExceptionHandling();

        $feature = make('App\Feature', ['belongs_to' => '']);

        $this->post(route('admin.features.store'), $feature->toArray())
            ->assertSessionHasErrors('belongs_to');
    }

    /** @test */
    function a_new_fature_can_be_persisted_to_database()
    {
        $feature = make('App\Feature');

        $this->post(route('admin.features.store'), $feature->toArray());

        $this->assertEquals(1, \App\Feature::all()->count());
    }
}
