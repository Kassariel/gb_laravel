<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_list_status_success(): void
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertStatus(200);
    }
    
    
    public function test_admin_create_status_success(): void
    {
        $response = $this->get(route('admin.categories.create'));

        $response->assertStatus(200);
    }
    
    public function test_admin_store_categories_success(): void
    {
        $data = [
            'title' => 'Some title',
            'description' => 'Some text'
        ];
        $response = $this->post(route('admin.categories.store'), $data);
        
        $response->assertJson($data)->assertCreated();
    }
    
    public function test_categories_status_success(): void
    {
        $response = $this->get(route('cat'));

        $response->assertStatus(200);
    }
    
    public function test_title_success(): void
    {
        $response = $this->get(route('cat'));

        $response->assertSeeText('Категории новостей');
    }
}
