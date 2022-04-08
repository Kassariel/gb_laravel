<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InfoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_status_success(): void
    {
        $response = $this->get(route('info'));

        $response->assertStatus(200);
    }
    
    public function test_store_info_success(): void
    {
        $data = [
            'author' => 'Some author',
            'tel' => 'Some tel',
            'email' => 'Some email',
            'description' => 'Some text'
        ];
        $response = $this->post(route('info.store'), $data);
        
        $response->assertJson($data)->assertCreated();
    }
}
