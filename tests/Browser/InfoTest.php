<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class InfoTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_create_info()
    {
       $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.info.create'))
                    ->type('author', 'Some author')
                    ->type('tel', '5768578758')
                    ->type('email', 'svajjvf@gmail.com')
                    ->type('url', 'https://laravel.com/')
                    ->type('description', 'Some text')
                    ->press('Сохранить')
                    ->assertSee('Запрос был добавлен')
                    ->assertPathIs('/admin/info');
        });
    }
    
    public function test_edit_info()
    {
       $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.info.edit', 2))
                    ->type('author', 'Some author')
                    ->type('tel', '5768578758')
                    ->type('email', 'svajjvf@gmail.com')
                    ->type('url', 'https://laravel.com/')
                    ->type('description', 'Some text')
                    ->press('Сохранить')
                    ->assertSee('Запрос был обновлен')
                    ->assertPathIs('/admin/info');
        });
    }
}
