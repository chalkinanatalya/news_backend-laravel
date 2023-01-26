<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    public function testIndexSuccessStatus():void
    {
        $response = $this->get(route('news'));

        $response->assertStatus(200);
    }

    public function testShowSuccessStatus():void
    {
        $response = $this->get(route('news.show', ['id' => 10]));

        $response->assertStatus(200);
    }
}
