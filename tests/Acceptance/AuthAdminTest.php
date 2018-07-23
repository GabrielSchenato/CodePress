<?php

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * Description of AuthAdminTest
 *
 * @author gabriel
 */
class AuthAdminTest extends DuskTestCase
{

    public function test_can_login_with_admin()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@codepress.com')
                    ->type('password', '123456')
                    ->press('Login')
                    ->assertPathIs('/home');
        });
    }

    public function test_can_visit_users_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/users')
                    ->assertPathIs('/admin/users')
                    ->assertSee('Users');
        });
    }

    public function test_can_visit_tags_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/tags')
                    ->assertPathIs('/admin/tags')
                    ->assertSee('Tags');
        });
    }

    public function test_can_visit_categories_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories')
                    ->assertPathIs('/admin/categories')
                    ->assertSee('Categories');
        });
    }

}
