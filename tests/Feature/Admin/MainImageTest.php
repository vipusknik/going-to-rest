<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MainImageTest extends TestCase
{
    protected $model;

    public function setUp()
    {
        parent::setUp();

        Storage::fake('public');

        $this->model = create(array_random([ 'App\RestCenter', 'App\MedicalCenter' ]));
    }

    /** @test */
    function attached_image_can_be_set_as_main_image()
    {
        $image = $this->model->addMedia($this->makeImage())
            ->preservingOriginal()
            ->toMediaCollection('images');

        $this->post(
            route('admin.main-images.store', $image),
            [ 'class' => get_class($this->model), 'id' => $this->model->id ]
        );

        $this->assertCount(1, $this->model->getMedia('main-image'));
    }

    /** @test */
    function there_is_only_one_main_image_for_a_model()
    {
        $this->model->addMedia($this->makeImage())
            ->preservingOriginal()
            ->toMediaCollection('main-image');

        $newMainImage = $this->model->addMedia($this->makeImage())
            ->preservingOriginal()
            ->toMediaCollection('image');

        $this->post(
            route('admin.main-images.store', $newMainImage),
            [ 'class' => get_class($this->model), 'id' => $this->model->id ]
        );

        $this->assertCount(1, $this->model->fresh()->getMedia('main-image'));
    }

    /** @test */
    function old_main_image_is_persisted_when_new_one_is_added()
    {
        $this->model->addMedia($this->makeImage())
            ->preservingOriginal()
            ->toMediaCollection('main-image');

        $newImage = $this->model->addMedia($this->makeImage())
            ->preservingOriginal()
            ->toMediaCollection('main-image');

        $this->post(
            route('admin.main-images.store', $newImage),
            [ 'class' => get_class($this->model), 'id' => $this->model->id ]
        );

        $this->assertCount(1, $this->model->getMedia('image'));
    }

    /** @test */
    function main_image_can_be_unsigned()
    {
        $image = $this->model->addMedia($this->makeImage())
            ->preservingOriginal()
            ->toMediaCollection('main-image');

        $this->delete(route('admin.main-images.destroy', $image));

        $this->assertCount(0, $this->model->fresh()->getMedia('main-image'));
    }

    protected function makeImage()
    {
        return UploadedFile::fake()->image(str_random() . '.png');
    }
}
