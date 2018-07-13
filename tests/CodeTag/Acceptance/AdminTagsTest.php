<?php

namespace CodePress\CodeTag\Acceptance\Tests;

use CodePress\CodeTag\Models\Tag;
use Laravel\Dusk\Browser;
use CodePress\CodeUser\Models\User;
use Tests\DuskTestCase;

/**
 * Description of AdminTagsTest
 *
 * @author gabriel
 */
class AdminTagsTest extends DuskTestCase
{

    protected function getUser()
    {
        return factory(User::class)->create();
    }

    public function test_can_not_access_tags()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/tags')
                    ->assertSee('Password');
        });
    }

    public function test_can_visit_admin_tags_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->getUser())
                    ->visit('/admin/tags')
                    ->assertSee('Tags');
        });
    }

    public function test_tags_listing()
    {
        Tag::create(['name' => 'Tag 1']);
        Tag::create(['name' => 'Tag 2']);
        Tag::create(['name' => 'Tag 3']);
        Tag::create(['name' => 'Tag 4']);

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/tags')
                    ->assertSee('Tag 1')
                    ->assertSee('Tag 2')
                    ->assertSee('Tag 3')
                    ->assertSee('Tag 4');
        });
        Tag::truncate();
    }

    public function test_click_create_new_tag()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/tags')
                    ->clickLink("Create Tag")
                    ->assertPathIs('/admin/tags/create');
        });
    }

    public function test_create_new_tag()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/tags/create')
                    ->type('name', 'Tag Test')
                    ->press('Create Tag')
                    ->assertPathIs('/admin/tags')
                    ->assertSee('Tag Test');
        });
    }

    public function test_click_edit_tag()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/tags')
                    ->clickLink("Edit tag")
                    ->assertPathIs('/admin/tags/1/edit');
        });
    }

    public function test_edit_tag()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/tags/1/edit')
                    ->type('name', 'Tag Edited')
                    ->press('Edit Tag')
                    ->assertPathIs('/admin/tags')
                    ->assertSee('Tag Edited');
        });
    }

    public function test_delete_tag()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/tags')
                    ->press("Delete tag")
                    ->assertDontSee('Tag Edited');
        });
    }

}
