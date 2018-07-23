<?php

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * Description of AuthEditorTest
 *
 * @author gabriel
 */
class AuthEditorTest extends DuskTestCase
{

    public function test_can_login_with_editor()
    {
        $this->browse(function ($browser) {
            $browser->driver->manage()->deleteAllCookies();
            $browser->visit('/login')
                    ->type('email', 'editor@codepress.com')
                    ->type('password', '123456')
                    ->press('Login')
                    ->assertPathIs('/home');
        });
    }

    public function test_can_visit_posts_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/posts')
                    ->assertPathIs('/admin/posts')
                    ->assertSee('Posts');
        });
    }

    public function test_cannot_visit_users_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/users')
                    ->assertDontSee('Users');
        });
    }

    public function test_cannot_visit_tags_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/tags')
                    ->assertDontSee('Tags');
        });
    }

    public function test_cannot_visit_categories_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories')
                    ->assertDontSee('Categories');
        });
    }

}
