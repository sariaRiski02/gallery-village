<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function PHPUnit\Framework\assertTrue;

class ImageTest extends TestCase
{

    // list image 
    public function test_listImage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('app');
    }


    public function test_Validation_Errors()
    {

        $response = $this->post('/add-image', [
            'image' => 'tidak ada image'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['image']);
    }


    public function test_validated_success()
    {
        $response = $this->post('/add-image', [
            'image' => UploadedFile::fake()->image('test.jpg')
        ]);

        $response->assertStatus(200);
    }
    public function test_image_success(): void
    {
        $file = UploadedFile::fake()->image('test_image.jpg', 600, 600);

        $response = $this->post('/add-image', [
            'image' => $file,
        ]);
        $response->assertStatus(200);
    }
}
