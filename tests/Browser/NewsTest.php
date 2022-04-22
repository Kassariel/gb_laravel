<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_create_news()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.news.create'))
                    ->select('category_id')
                    ->type('title', 'Some title')
                    ->type('author', 'Some author')
                    ->select('status', 'DRAFT')
                    ->type('description', 'Some text')
                    ->press('Сохранить')
                    ->assertSee('Новость была добавлена')
                    ->assertPathIs('/admin/news');
        });
    }
    
    public function test_edit_news()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.news.edit', 2))
                    ->select('category_id')
                    ->type('title', 'Some title')
                    ->type('author', 'Some author')
                    ->select('status', 'DRAFT')
                    ->type('description', 'Some text')
                    ->press('Сохранить')
                    ->assertSee('Новость была обновлена')
                    ->assertPathIs('/admin/news');
        });
    }
}

    