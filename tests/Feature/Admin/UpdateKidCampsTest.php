<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;

class UpdateKidCampsTest extends TestCase
{
    /** @test */
    function kid_camp_edit_page_can_be_visited()
    {
        $kidCamp = create('App\KidCamp');

        $this->get(route('admin.kid-camps.edit', $kidCamp))->assertStatus(200);
    }

    /** @test */
    function kid_camp_name_has_to_be_unique_on_update()
    {
        create('App\KidCamp', [ 'name' => 'center' ]);

        $kidCamp = create('App\KidCamp');

        $this->patch(
                route('admin.kid-camps.update', $kidCamp),
                [ 'name' => 'center' ] + $kidCamp->toArray()
            )
            ->assertSessionHasErrors('name');
    }

    /** @test */
    function kid_camp_name_has_to_be_unique_on_update_ignoring_the_rest_center_itself()
    {
        $kidCamp = create('App\KidCamp');

        $this->patch(route('admin.kid-camps.update', $kidCamp), $kidCamp->toArray());

        $this->assertNull(session('errors'));
    }

    /** @test */
    function a_kid_camp_name_can_be_updated()
    {
        $kidCamp = create('App\KidCamp');

        $this->patch(
                route('admin.kid-camps.update', $kidCamp),
                [ 'name' => 'updated' ] + $kidCamp->getAttributes()
            );

        $this->assertEquals('updated', $kidCamp->fresh()->name);
    }

    /** @test */
    function the_attached_features_can_be_updated()
    {
        $features = [ create('App\Feature')->id => '' ];

        $kidCamps = create('App\KidCamp')
            ->attachFeatures($features);

        $this->assertCount(1, $kidCamps->features);

        $features[create('App\Feature')->id] = '';

        $this->patch(
            route('admin.kid-camps.update', $kidCamps),
            $kidCamps->getAttributes() + [ 'features' => $features ]
        );

        $this->assertCount(2, $kidCamps->fresh()->features);
    }

    /** @test */
    function attached_social_media_can_be_updated()
    {
        $kidCamp = create('App\KidCamp')
            ->attachSocialMedia([ 'instagram' => 'http://instagram.com' ]);

        $socialMedia = [
            'instagram' => 'http://instagram.com',
            'facebook' => 'http://facebook.com'
        ];

        $this->patch(
            route('admin.kid-camps.update', $kidCamp),
            [ 'social_media' => $socialMedia ] + $kidCamp->getAttributes()
        );

        $this->assertCount(2, $kidCamp->social_media);
    }
}
