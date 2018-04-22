<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;

class AdminMiddlewareTest extends TestCase
{
    /** @test */
    function only_admins_can_visit_admin_section()
    {
        $this->signIn()
            ->get('/admin/rest-centers')
            ->assertForbidden();

        $this->signInAdmin()
            ->get('/admin/rest-centers')
            ->assertSuccessful();
    }
}
