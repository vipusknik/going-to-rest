<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Feature;

class FeaturesTest extends TestCase
{
    /** @test */
    public function only_admins_are_allowed_to_create_new_features()
    {
        $this->signIn();

        $feature = make('App\Feature');

        $this->post(route('admin.features.store'), $feature->getAttributes())
            ->assertStatus(403);

        $this->signInAdmin();

        $this->post(route('admin.features.store'), $feature->getAttributes())
            ->assertStatus(200);
    }

    /** @test */
    function a_new_feature_requires_a_name()
    {
        $feature = make('App\Feature', ['name' => '']);

        $this->post(route('admin.features.store'), $feature->getAttributes())
            ->assertSessionHasErrors('name');
    }

    /** @test */
    function feature_name_has_to_be_unique_by_belongs_to_attribute()
    {
        $restCenterFeature = make('App\Feature', ['name' => 'Купание', 'belongs_to' => 'rest_center']);
        $this->post(route('admin.features.store'), $restCenterFeature->getAttributes())
            ->assertStatus(200);

        $this->post(route('admin.features.store'), $restCenterFeature->getAttributes())
            ->assertSessionHasErrors('name');

        $accomodationFeature = make('App\Feature', ['name' => 'Купание', 'belongs_to' => 'accomodation']);
        $this->post(route('admin.features.store'), $accomodationFeature->getAttributes())
            ->assertStatus(200);
    }

    /** @test */
    function a_new_feature_requires_a_category()
    {
        $feature = make('App\Feature', ['category' => '']);

        $this->post(route('admin.features.store'), $feature->getAttributes())
            ->assertSessionHasErrors('category');
    }

    /** @test */
    function a_new_feature_requires_a_belongs_to_attribute()
    {
        // $this->withoutExceptionHandling();

        $feature = make('App\Feature', ['belongs_to' => '']);

        $this->post(route('admin.features.store'), $feature->getAttributes())
            ->assertSessionHasErrors('belongs_to');
    }

    /** @test */
    function a_new_fature_can_be_persisted_to_database()
    {
        $feature = make('App\Feature');

        $this->post(route('admin.features.store'), $feature->getAttributes());

        $this->assertEquals(1, \App\Feature::all()->count());
    }

    /** @test */
    function feature_has_category_name_in_russian()
    {
        $feature = create('App\Feature', [ 'category' => Feature::CATEGORY_FACILITIES ]);
        $this->assertEquals('Удобства', $feature->category_in_russian);

        $feature = create('App\Feature', [ 'category' => Feature::CATEGORY_LEASURES ]);
        $this->assertEquals('Досуг', $feature->category_in_russian);

        $feature = create('App\Feature', [ 'category' => Feature::CATEGORY_TREATMENT_TYPES ]);
        $this->assertEquals('Виды лечения', $feature->category_in_russian);

        $feature = create('App\Feature', [ 'category' => Feature::CATEGORY_PROCEDURES ]);
        $this->assertEquals('Процедуры', $feature->category_in_russian);

        $feature = create('App\Feature', [ 'category' => Feature::CATEGORY_OCCUPATIONS ]);
        $this->assertEquals('Досуг, кружки и развлечения', $feature->category_in_russian);
    }
}
