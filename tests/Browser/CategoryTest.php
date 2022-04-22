<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_create_category()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.categories.create'))
                    ->type('title', 'Some title')
                    ->type('description', 'Some text')
                    ->press('Сохранить')
                    ->assertSee('Категория была добавлена')
                    ->assertPathIs('/admin/categories');
        });
    }
    
    public function test_edit_category()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.categories.edit', 2))
                    ->type('title', 'Some title')
                    ->type('description', 'Some text')
                    ->press('Сохранить')
                    ->assertSee('Категория была обновлена')
                    ->assertPathIs('/admin/categories');
        });
    }
}
