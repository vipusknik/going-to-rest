<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class RestCenterMediaTest extends TestCase
{
    /** @test */
    function uploaded_file_is_required()
    {
        $restCenter = create('App\RestCenter');

        Storage::fake('public');

        $this->post(
                route('admin.rest-centers.media.store', $restCenter),
                [ 'image' => null ]
            )->assertSessionHasErrors('image');
    }

    /** @test */
    function uploaded_file_has_to_be_an_image()
    {
        $restCenter = create('App\RestCenter');

        Storage::fake('public');

        $this->post(
                route('admin.rest-centers.media.store', $restCenter),
                [ 'image' => UploadedFile::fake()->create('somefile.docx') ]
            )->assertSessionHasErrors('image');

        $this->post(
                route('admin.rest-centers.media.store', $restCenter),
                [ 'image' => UploadedFile::fake()->image('image.jpg') ]
            );
        $this->assertNull(session('errors'));
    }

    /** @test */
    function uploaded_file_size_has_to_be_less_than_10_mb()
    {
        $restCenter = create('App\RestCenter');

        Storage::fake('public');

        $size = 11 * 1000; // 11 megs

        $this->post(
                route('admin.rest-centers.media.store', $restCenter),
                [ 'image' => UploadedFile::fake()->create('avatar.png', $size) ]
            )->assertSessionHasErrors('image');

        $size = 9 * 1000; // 9 megs

        $this->post(
                route('admin.rest-centers.media.store', $restCenter),
                [ 'image' => UploadedFile::fake()->create('avatar.png', $size) ]
            );

        $this->assertNull(session('errors'));
    }

    /** @test */
    function uploaded_image_is_attached_to_a_rest_center()
    {
        $restCenter = create('App\RestCenter');

        Storage::fake('public');

        $this->post(
                route('admin.rest-centers.media.store', $restCenter),
                [ 'image' => UploadedFile::fake()->image('image.jpg') ]
            );

        $this->assertEquals(1, $restCenter->fresh()->media->count());
    }

    /** @test */
    function media_file_name_is_converted_to_latin_using_slug()
    {
        $this->withoutExceptionHandling();

        $restCenter = create('App\RestCenter');

        Storage::fake('public');

        $this->post(
                route('admin.rest-centers.media.store', $restCenter),
                [ 'image' => UploadedFile::fake()->image('Название картинки.jpeg') ]
            );

        $this->assertEquals(
            str_slug('Название картинки.jpeg') . '.jpeg',
            $restCenter->fresh()->getMedia('images')->first()->file_name
        );
    }
}
