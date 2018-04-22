<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    public function setUp()
    {
        parent::setUp();

        $this->signInAdmin();
    }

    protected function signIn($user = null)
    {
        $user = $user ?: create(\App\User::class);
        $this->actingAs($user);
        return $this;
    }

    protected function signInAdmin($admin = null)
    {
        $admin = $admin ?: create(\App\User::class);

        config(['going-to-rest.admins' => [ $admin->email ]]);

        $this->actingAs($admin);

        return $this;
    }

    public function se()
    {
        $this->withoutExceptionHandling();
    }
}
