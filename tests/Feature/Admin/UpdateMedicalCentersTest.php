<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;

class UpdateMedicalCentersTest extends TestCase
{
    /** @test */
    function medical_center_edit_page_can_be_visited()
    {
        $medicalCenter = create('App\MedicalCenter');

        $this->get(route('admin.medical-centers.edit', $medicalCenter))->assertStatus(200);
    }

    /** @test */
    function medical_center_name_has_to_be_unique_on_update()
    {
        create('App\MedicalCenter', [ 'name' => 'center' ]);

        $medicalCenter = create('App\MedicalCenter');

        $this->patch(
                route('admin.medical-centers.update', $medicalCenter),
                [ 'name' => 'center' ] + $medicalCenter->toArray()
            )
            ->assertSessionHasErrors('name');
    }

    /** @test */
    function medical_center_name_has_to_be_unique_on_update_ignoring_the_rest_center_itself()
    {
        $medicalCenter = create('App\MedicalCenter');

        $this->patch(route('admin.rest-centers.update', $medicalCenter), $medicalCenter->toArray());

        $this->assertNull(session('errors'));
    }

    /** @test */
    function a_medical_center_name_can_be_updated()
    {
        $medicalCenter = create('App\MedicalCenter');

        $this->patch(
                route('admin.medical-centers.update', $medicalCenter),
                [ 'name' => 'updated' ] + $medicalCenter->getAttributes()
            );

        $this->assertEquals('updated', $medicalCenter->fresh()->name);
    }

    /** @test */
    function the_attached_features_can_be_updated()
    {
        $features = [ create('App\Feature')->id => '' ];

        $medicalCenter = create('App\MedicalCenter')
            ->attachFeatures($features);

        $this->assertCount(1, $medicalCenter->features);

        $features[create('App\Feature')->id] = '';

        $this->patch(
            route('admin.medical-centers.update', $medicalCenter),
            $medicalCenter->getAttributes() + [ 'features' => $features ]
        );

        $this->assertCount(2, $medicalCenter->fresh()->features);
    }

    /** @test */
    function attached_social_media_can_be_updated()
    {
        $this->se();

        $medicalCenter = create('App\MedicalCenter')
            ->attachSocialMedia([ 'instagram' => 'http://instagram.com' ]);

        $socialMedia = [
            'instagram' => 'http://instagram.com',
            'facebook' => 'http://facebook.com'
        ];

        $this->patch(
            route('admin.medical-centers.update', $medicalCenter),
            [ 'social_media' => $socialMedia ] + $medicalCenter->getAttributes()
        );

        $this->assertCount(2, $medicalCenter->social_media);
    }
}
