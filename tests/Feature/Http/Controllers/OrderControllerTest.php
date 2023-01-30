<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderControllrTest extends TestCase
{
    public function testIndexSuccessStatus():void
    {
        $response = $this->get(route('order'));

        $response->assertStatus(200);
    }
}
