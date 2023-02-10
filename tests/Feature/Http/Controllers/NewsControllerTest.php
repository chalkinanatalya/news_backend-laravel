<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    public function testIndexSuccessStatus():void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function testCreateSuccessStatus(): void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function testCreateSaveSuccessData(): void
    {
        $news = News::factory()->definition();

        $response = $this->post(route('admin.news.store'), $news);

        $response->assertStatus(200);
    }

    public function testValidateTitleData(): void
    {
        $data = [
            'author' => \fake()->userName(),
            'description' => \fake()->text(100),
        ];
        $response = $this->post(route('admin.news.store'), $data);
        $response->assertRedirect('http://localhost');
    }
}
