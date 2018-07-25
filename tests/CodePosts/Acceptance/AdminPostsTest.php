<?php

namespace CodePress\CodePosts\Acceptance\Tests;

use CodePress\CodePosts\Models\Post;
use CodePress\CodeUser\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * Description of AdminPostsTest
 *
 * @author gabriel
 */
class AdminPostsTest extends DuskTestCase
{

    public function test_can_not_access_posts()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/posts')
                    ->assertSee('Password');
        });
    }

    public function test_can_visit_admin_posts_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@codepress.com')
                    ->type('password', '123456')
                    ->press('Login')
                    ->visit('/admin/posts')
                    ->assertSee('Posts');
        });
    }

    public function test_posts_listing()
    {
        Post::create(['title' => 'Post 1', 'image' => '123456', 'content' => 'Conteudo do meu post']);
        Post::create(['title' => 'Post 2', 'image' => '123456', 'content' => 'Conteudo do meu post']);
        Post::create(['title' => 'Post 3', 'image' => '123456', 'content' => 'Conteudo do meu post']);
        Post::create(['title' => 'Post 4', 'image' => '123456', 'content' => 'Conteudo do meu post']);

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/posts')
                    ->assertSee('Post 1')
                    ->assertSee('Post 2')
                    ->assertSee('Post 3')
                    ->assertSee('Post 4');
        });
        Post::truncate();
    }

    public function test_click_create_new_post()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/posts')
                    ->clickLink("Create Post")
                    ->assertPathIs('/admin/posts/create');
        });
    }

    //Não tem uma forma de interagir com Tinymce
    /*
      public function test_create_new_post()
      {
      $this->browse(function (Browser $browser) {
      $browser->visit('/admin/posts/create')
      ->type('title', 'Post Test')
      ->type('content', 'Post Test')
      ->press('Create Post')
      ->assertPathIs('/admin/posts')
      ->assertSee('Post Test');
      });
      }

      public function test_click_edit_post()
      {
      $this->browse(function (Browser $browser) {
      $browser->visit('/admin/posts')
      ->clickLink("Edit post")
      ->assertPathIs('/admin/posts/1/edit');
      });
      }

      public function test_edit_post()
      {
      $this->browse(function (Browser $browser) {
      $browser->visit('/admin/posts/1/edit')
      ->type('title', 'Post Edited')
      ->press('Edit Post')
      ->assertPathIs('/admin/posts')
      ->assertSee('Post Edited');
      });
      }

      public function test_delete_post()
      {
      $this->browse(function (Browser $browser) {
      $browser->visit('/admin/posts')
      ->press("Delete post")
      ->assertDontSee('Post Edited');
      });
      }

      public function test_click_deleted_post()
      {
      $this->browse(function (Browser $browser) {
      $browser->visit('/admin/posts')
      ->clickLink("Deleted Posts")
      ->assertPathIs('/admin/posts/deleted');
      });
      }

      public function test_restore_post()
      {
      $this->browse(function (Browser $browser) {
      $browser->visit('/admin/posts/deleted')
      ->clickLink("Restore post")
      ->assertSee('Post Edited');
      });
      } */
}
