<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_list_status_success(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }
    
    public function test_admin_create_status_success(): void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }
    
    public function test_admin_store_news_success(): void
    {
        $data = [
            'title' => 'Some title',
            'author' => 'Some author',
            'description' => 'Some text'
        ];
        $response = $this->post(route('admin.news.store'), $data);
        
        $response->assertJson($data)->assertCreated();
    }
    
    public function test_news_status_success(): void
    {
        $response = $this->get(route('news'));

        $response->assertStatus(200);
    }
    
    public function test_title_success(): void
    {
        $response = $this->get(route('news'));

        $response->assertSeeText('Список новостей');
    }
}
