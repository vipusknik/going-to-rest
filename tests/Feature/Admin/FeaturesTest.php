<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Feature;

class FeaturesTest extends TestCase
{
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
        $feature = create(
            'App\Feature', [ 'name' => 'Купание', 'belongs_to' => 'rest_center' ]
        );

        $this->post(
                route('admin.features.store'), $feature->getAttributes()
            )->assertSessionHasErrors('name');

        $this->post(
                route('admin.features.store'), $feature->getAttributes() + [ 'belongs_to' => 'accomodation' ]
            )->assertSessionMissing('errors.name');
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
        $feature = make('App\Feature', [ 'belongs_to' => '' ]);

        $this->post(route('admin.features.store'), $feature->getAttributes())
            ->assertSessionHasErrors('belongs_to');
    }

    /** @test */
    function a_new_fature_can_be_persisted_to_database()
    {
        $feature = make('App\Feature');

        $this->post(route('admin.features.store'), $feature->getAttributes());

        $this->assertCount(1, Feature::all());
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

    /** @test */
    function features_can_be_deleted()
    {
        $feature = create('App\Feature');

        $this->delete(route('admin.features.destroy', $feature));

        $this->assertDatabaseMissing('features', [ 'name' => $feature->name ]);
    }

    /** @test */
    function a_feature_cannot_be_deleted_if_it_is_associated_with_another_model()
    {
        $feature = create('App\Feature');

        create('App\MedicalCenter')->features()->attach($feature->id);

        $this->assertCount(1, \App\MedicalCenter::first()->features);

        $this->delete(route('admin.features.destroy', $feature))->assertStatus(422);

        $this->assertDatabaseHas('features', [ 'name' => $feature->name ]);
    }

    /** @test */
    function feature_requires_a_unique_name_ignoring_itself_on_update()
    {
        $feature = create('App\Feature');

        $this->patch(route('admin.features.update', $feature), $feature->getAttributes());

        $this->assertNull(session('errors'));
    }

    /** @test */
    function a_feature_can_be_updated()
    {
        $feature = create('App\Feature');

        $this->patch(
            route('admin.features.update', $feature),
            [ 'name' => 'updated' ] + $feature->getAttributes()
        );

        $this->assertEquals('updated', $feature->fresh()->name);
    }
}
