<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class MedicalCentersTest extends TestCase
{
    /** @test */
    function index_page_can_be_visited()
    {
        $this->get('/admin/medical-centers')->assertStatus(200);
    }

    /** @test */
    function medical_centers_can_be_searched_by_query()
    {
        create('App\MedicalCenter', [ 'name' => 'Medical Center 1' ]);
        create('App\MedicalCenter', [ 'name' => 'Medical Center 2' ]);

        $response = $this->getJson('/admin/medical-centers?query=medical');

        $this->assertCount(2, $response->original['medicalCenters']);
    }

    /** @test */
    function medical_center_information_can_be_retrieved_on_request()
    {
        $medicalCenter = create('App\MedicalCenter');

        $response = $this->getJson(route('admin.medical-centers.show', $medicalCenter));

        $response->assertJson([ 'medicalCenter' => true ]);
    }

    /** @test */
    function medical_center_can_be_deleted()
    {
        $medicalCenter = create('App\MedicalCenter');

        $this->delete(route('admin.medical-centers.destroy', $medicalCenter))->assertStatus(200);

        $this->assertDataBaseMissing('medical_centers', [ 'id' => $medicalCenter->id ]);
    }
}
