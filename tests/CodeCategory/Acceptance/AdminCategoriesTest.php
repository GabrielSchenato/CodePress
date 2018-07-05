<?php

namespace CodePress\CodeCategory\Acceptance\Tests;

use CodePress\CodeCategory\Models\Category;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * Description of AdminCategoriesTest
 *
 * @author gabriel
 */
class AdminCategoriesTest extends DuskTestCase
{
    


    public function test_can_visit_admin_categories_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories')
                    ->assertSee('Categories');
        });
    }
    
    public function test_categories_listing()
    {
        Category::create(['name' => 'Category 1', 'active' => true]);
        Category::create(['name' => 'Category 2', 'active' => true]);
        Category::create(['name' => 'Category 3', 'active' => true]);
        Category::create(['name' => 'Category 4', 'active' => true]);
        
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories')
                    ->assertSee('Category 1')
                    ->assertSee('Category 2')
                    ->assertSee('Category 3')
                    ->assertSee('Category 4');
        });
        Category::truncate();
    }
    
    public function test_click_create_new_category()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories')
                    ->clickLink("Create Category")
                    ->assertPathIs('/admin/categories/create');
        });
    }
    
    public function test_create_new_category()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                    ->type('name', 'Category Test')
                    ->check('active')
                    ->press('Create Category')
                    ->assertPathIs('/admin/categories')
                    ->assertSee('Category Test');
        });
    }
    
    public function test_click_edit_category()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories')
                    ->clickLink("Edit category")
                    ->assertPathIs('/admin/categories/1/edit');
        });
    }
    
    public function test_edit_category()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/1/edit')
                    ->type('name', 'Category Edited')
                    ->check('active')
                    ->press('Edit Category')
                    ->assertPathIs('/admin/categories')
                    ->assertSee('Category Edited');
        });
    }
    
    public function test_delete_category()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories')
                    ->press("Delete category")
                    ->assertDontSee('Category Edited');
        });
    }

}
