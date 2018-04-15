<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Feature;

class CreateMedicalCentersTest extends TestCase
{
    /** @test */
    function create_medical_center_page_can_be_visited()
    {
        $this->get(route('admin.medical-centers.create'))->assertStatus(200);
    }

    /** @test */
    function medical_center_requires_a_name()
    {
        $medicalCenter = make('App\MedicalCenter', [ 'name' => '' ]);

        $this->post(route('admin.medical-centers.store'), $medicalCenter->getAttributes())
            ->assertSessionHasErrors('name');
    }

    /** @test */
    function medical_center_requires_a_unique_name()
    {
        $medicalCenter = create('App\MedicalCenter');

        $this->post(
            route('admin.medical-centers.store'),
            make('App\MedicalCenter', [ 'name' => $medicalCenter->name ])->getAttributes()
        )->assertSessionHasErrors('name');
    }

    /** @test */
    public function medical_center_can_be_persisted()
    {
        $this->post(
            route('admin.medical-centers.store'),
            $medicalCenter = make('App\MedicalCenter')->getAttributes()
        );

        $this->assertDatabaseHas('medical_centers', [ 'name' => $medicalCenter['name'] ]);
    }
}
