<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Animal;

class AnimalsTest extends TestCase
{
    /** @test */
    function an_animal_requries_a_unique_name()
    {
        $this->post(route('admin.animals.store'), [ 'name' => '' ])->assertSessionHasErrors('name');
    }

    /** @test */
    function animal_name_has_to_be_unique()
    {
        $animal = Animal::create([ 'name' => 'name', 'type' => 'animal', 'winter' => 1 ]);

        $this->post(route('admin.animals.store'), [ 'name' => $animal->name ])
             ->assertSessionHasErrors('name');
    }

    /** @test */
    function animal_requires_a_type()
    {
        $this->post(route('admin.animals.store'), [ 'type' => '' ])->assertSessionHasErrors('type');
    }

    /** @test */
    function animal_type_has_to_be_either_anomal_or_fish_or_bird()
    {
        $this->post(route('admin.animals.store'), [ 'type' => 'dinazaur' ])->assertSessionHasErrors('type');
    }

    /** @test */
    function at_least_on_season_is_requried_for_animals()
    {
        $this->post(route('admin.animals.store'), [ 'seasons' => [] ])->assertSessionHasErrors('seasons.0');
    }

    /** @test */
    function animal_can_be_persisted()
    {
        $this->post(route('admin.animals.store'), [
            'name' => 'bear',
            'type' => 'animal',
            'seasons'  => [ 'winter' ]
        ]);

        $this->assertCount(1, Animal::all());
    }

    /** @test */
    function animal_is_returned_in_json_response_after_persisting()
    {
        $this->post(route('admin.animals.store'), [
            'name' => 'bear',
            'type' => 'animal',
            'seasons'  => [ 'winter' ]
        ])->assertjson([ 'model' => true ]);
    }

    /** @test */
    function an_animal_can_be_deleted()
    {
        $animal = Animal::create([
            'name' => 'bear',
            'type' => 'animal',
            'winter'  => 1
        ]);

        $this->delete(route('admin.animals.destroy', $animal));

        $this->assertCount(0, Animal::all());
    }

    /** @test */
    function an_animal_cannot_be_deleted_if_it_is_associated_with_a_hunting_company()
    {
        $animal = Animal::create([
            'name' => 'bear',
            'type' => 'animal',
            'spring'  => 1
        ]);

        create('App\HuntingCompany')->animals()->attach([ $animal->id ]);

        $this->delete(route('admin.animals.destroy', $animal))->assertStatus(422);

        $this->assertCount(1, Animal::all());
    }

    /** @test */
    function an_animal_can_be_updated()
    {
        $animal = create('App\Animal');

        $this->patch(route('admin.animals.update', $animal), [
            'name' => 'updated',
            'type' => 'animal',
            'seasons'  => [ 'winter' ]
        ]);

        $this->assertEquals('updated', $animal->fresh()->name);
    }

    /** @test */
    function animal_nam_has_to_be_unique_on_update_ignoring_itself()
    {
        $animal = create('App\Animal');

        $this->patch(route('admin.animals.update', $animal), [
            'name' => $animal->name,
            'type' => 'animal',
            'seasons'  => [ 'winter' ]
        ]);

        $this->assertNull(session('errors'));
    }
}
