<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetTasks(): void
    {
        $response = $this->get('/api/v1/tasks');

        $this->assertJson($response->content());

        $response->assertStatus(Response::HTTP_OK);
    }
}
