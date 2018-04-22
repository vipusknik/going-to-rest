<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class PaidCompaniesTest extends TestCase
{
    /** @test */
    function rest_center_paid_status_defaults_to_false_on_database_level()
    {
        $restCenter = create('App\RestCenter');

        $this->assertFalse($restCenter->fresh()->is_paid);
    }

    /** @test */
    function toggling_paid_status_requires_valid_class_path()
    {
        $restCenter = create('App\RestCenter');

        $this->post(
            route('admin.paid-companies.store'),
            [ 'class' => 'NotExisting', 'id' => $restCenter->id ]
        )->assertSessionHasErrors('class');

        $this->post(
            route('admin.paid-companies.store'),
            [ 'class' => get_class($restCenter), 'id' => $restCenter->id ]
        );

        $this->assertNull(session('errors'));
    }

    /** @test */
    function rest_center_paid_status_can_be_toggled()
    {
        $restCenter = create('App\RestCenter');

        $this->post(
            route('admin.paid-companies.store'),
            [ 'class' => get_class($restCenter), 'id' => $restCenter->id ]
        );
        $this->assertTrue($restCenter->fresh()->is_paid);

        $this->delete(
            route('admin.paid-companies.destroy'),
            [ 'class' => get_class($restCenter), 'id' => $restCenter->id ]
        );
        $this->assertFalse($restCenter->fresh()->is_paid);
    }
}
