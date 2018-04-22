<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Feature;
use App\RestCenter;

class UpdateRestCentersTest extends TestCase
{
    /** @test */
    function rest_center_edit_page_can_be_visited()
    {
        $restCenter = create('App\RestCenter');

        $this->get(route('admin.rest-centers.edit', $restCenter))->assertStatus(200);
    }

    /** @test */
    function rest_center_name_has_to_be_unique_on_update()
    {
        $restCenter = create('App\RestCenter');

        $anotherRestCenter = create('App\RestCenter');

        $this->patch(
                route('admin.rest-centers.update', $anotherRestCenter),
                [ 'name' => $restCenter->name ] + $anotherRestCenter->toArray()
            )->assertSessionHasErrors('name');
    }

    /** @test */
    function rest_center_name_has_to_be_unique_on_update_ignoring_the_rest_center_itself()
    {
        $restCenter = create('App\RestCenter');

        $this->patch(route('admin.rest-centers.update', $restCenter), $restCenter->toArray());
        $this->assertNull(session('errors'));
    }

    /** @test */
    function a_rest_center_name_can_be_updated()
    {
        $restCenter = create('App\RestCenter');

        $this->patch(
                route('admin.rest-centers.update', $restCenter),
                [ 'name' => 'updated' ] + $restCenter->getAttributes()
            );

        $this->assertEquals('updated', $restCenter->fresh()->name);
    }

    /** @test */
    function a_rest_center_accomodations_description_can_be_updated()
    {
        $restCenter = create('App\RestCenter');

        $this->patch(
                route('admin.rest-centers.accomodation-description.update', $restCenter),
                [ 'accomodation' => 'updated' ]
            );

        $this->assertEquals('updated', $restCenter->fresh()->accomodation);
    }

    /** @test */
    function rest_center_features_can_be_updated()
    {
        $restCenter = create('App\RestCenter');

        $feature1 = create('App\Feature');

        $restCenter->attachFeatures([ $feature1->id => '' ]);

        $this->assertCount(1, $restCenter->features);

        $feature2 = create('App\Feature');

        $features = [ $feature1->id => '', $feature2->id => '' ];

        $this->patch(
                route('admin.rest-centers.update', $restCenter),
                [ 'features' => $features ] + $restCenter->getAttributes()
            );

        $this->assertCount(2, $restCenter->fresh()->features);
    }

    /** @test */
    function attached_social_media_can_be_updated_on_a_rest_center()
    {
        $restCenter = create('App\RestCenter')
            ->attachSocialMedia([
                'instagram' => 'http://instagram.com',
                'facebook' => 'http://facebook.com'
            ]);

        $this->assertCount(2, $restCenter->fresh()->social_media);

        $this->patch(
            route('admin.rest-centers.update', $restCenter),
            [ 'social_media' => [ 'instagram' => 'https://instagram.com' ] ] + $restCenter->getAttributes()
        );

        $this->assertCount(1, $restCenter->fresh()->social_media);
    }
}
