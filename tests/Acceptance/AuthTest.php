<?php

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * Description of AuthTest
 *
 * @author gabriel
 */
class AuthTest extends DuskTestCase
{

    public function test_can_login_in_application()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'gabriel.schenato@inovadora.com.br')
                    ->type('password', '123456')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->assertSee('Dashboard');
            $browser->driver->manage()->deleteAllCookies();
        });
    }

    public function test_can_not_login_in_application()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'teste@inovadora.com.br')
                    ->type('password', 'asdsa')
                    ->press('Login')
                    ->assertPathIs('/login')
                    ->assertSee('Password');
        });
    }

}
