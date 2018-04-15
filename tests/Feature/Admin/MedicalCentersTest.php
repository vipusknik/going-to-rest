<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class MedicalCentersTest extends TestCase
{
    /** @test */
    function index_page_can_be_visited()
    {
        $this->withoutExceptionHandling();
        $this->get('/admin/medical-centers')->assertStatus(200);
    }

}
