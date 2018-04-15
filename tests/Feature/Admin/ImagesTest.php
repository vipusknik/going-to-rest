<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImagesTest extends TestCase
{
    protected $model;

    public function setUp()
    {
        parent::setUp();

        Storage::fake('public');

        $this->model = create(array_random([
            'App\RestCenter',
            'App\MedicalCenter',
        ]));
    }

    /** @test */
    function uploaded_file_is_required()
    {
        $this->post(route('admin.images.store'), [ 'image' => null ])->assertSessionHasErrors('image');
    }

    /** @test */
    function uploaded_file_has_to_be_an_image()
    {
        $this->post(
                route('admin.images.store'),
                [ 'image' => UploadedFile::fake()->create('somefile.docx') ]
            )->assertSessionHasErrors('image');

        $this->post(
                route('admin.images.store'),
                [ 'image' => UploadedFile::fake()->image('image.jpg') ]
            )->assertSessionMissing('image');
    }

    /** @test */
    function uploaded_file_size_has_to_be_less_than_20_mb()
    {
        $size = 11 * 2000; // 22 megs

        $this->post(
                route('admin.images.store'),
                [ 'image' => UploadedFile::fake()->create('avatar.png', $size) ]
            )->assertSessionHasErrors('image');

        $size = 9 * 2000; // 18 megs

        $this->post(
                route('admin.images.store'),
                [ 'image' => UploadedFile::fake()->create('avatar.png', $size) ]
            )->assertSessionMissing('image');
    }

    /** @test */
    function image_upload_requires_model_class_path()
    {
        $this->post(
                route('admin.images.store'),
                [ 'image' => UploadedFile::fake()->image('image.jpg'), 'class' => null ]
            )->assertSessionHasErrors('class');
    }

    /** @test */
    function existing_model_class_path_has_to_be_provided_on_persisting_an_image()
    {
        $this->post(
                route('admin.images.store'),
                [ 'image' => UploadedFile::fake()->image('image.jpg'), 'class' => 'NotExistingClass' ]
            )->assertSessionHasErrors('class');

        $this->post(
                route('admin.images.store'),
                [ 'image' => UploadedFile::fake()->image('image.jpg'), 'class' => 'App\MedicalCenter' ]
            )->assertSessionMissing('class');
    }

    /** @test */
    function image_upload_requires_model_id()
    {
        $this->post(
                route('admin.images.store'),
                [ 'image' => UploadedFile::fake()->image('image.jpg'), 'id' => null ]
            )->assertSessionHasErrors('id');
    }

    /** @test */
    function image_file_name_is_converted_to_latin_using_slug()
    {
        $this->post(
                route('admin.images.store'),
                [ 'image' => UploadedFile::fake()->image('Название картинки.jpeg') , 'class' => get_class($this->model), 'id' => $this->model->id ]
            );

        $this->assertEquals(
            str_slug('Название картинки.jpeg') . '.jpeg',
            $this->model->fresh()->getMedia('images')->first()->file_name
        );
    }

    /** @test */
    function image_can_be_attached_to_a_model()
    {
        $this->post(
                route('admin.images.store'),
                [ 'image' => UploadedFile::fake()->image('image.jpg'), 'class' => get_class($this->model), 'id' => $this->model->id ]
            );

        $this->assertCount(1, $this->model->fresh()->media);
    }

    /** @test */
    function attached_images_can_be_deleted()
    {
        $this->model
            ->addMedia(UploadedFile::fake()->image('image.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('images');

        $this->assertCount(1, $this->model->fresh()->media);

        $image = $this->model->media->first();
        $this->delete(
                route('admin.images.destroy', $image)
            );

        $this->assertCount(0, $this->model->fresh()->media);
    }
}
