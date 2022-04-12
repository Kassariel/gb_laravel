<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MainTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function test_list_status_success(): void
    {
        $response = $this->get(route('main'));

        $response->assertStatus(200);
    }
    
    public function test_store_main_success(): void
    {
        $data = [
            'author' => 'Some author',
            'description' => 'Some text'
        ];
        $response = $this->post(route('main.store'), $data);
        
        $response->assertJson($data)->assertCreated();
    }
}
