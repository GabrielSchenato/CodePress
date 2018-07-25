<?php

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * Description of EmailRegistrationTest
 *
 * @author gabriel
 */
class EmailRegistrationTest extends DuskTestCase
{
//Não funciona a criação de rotas!!!
/*    protected function createRoute()
    {
        Route::middleware(['web'])->group(function () {
            Route::get('/email/registration', function () {
                return view('email.registration', [
                    'username' => 'teste@teste.com',
                    'password' => '123456'
                ]);
            });
        });
    }

    public function test_can_generate_html_from_template()
    {
        $this->createRoute();
        $this->browse(function (Browser $browser) {
            $browser->visit('/email/registration')
                    ->assertSee('teste@teste.com')
                    ->assertSee('123456');
        });
    }
*/
    public function test_nothing()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/nothing')
                    ->assertSee('Opsss');
        });
    }

}
