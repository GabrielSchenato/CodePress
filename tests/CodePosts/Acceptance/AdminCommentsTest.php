<?php

namespace CodePress\CodePosts\Acceptance\Tests;

use CodePress\CodePosts\Models\Comment;
use CodePress\CodePosts\Models\Post;
use CodePress\CodeUser\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * Description of AdminCommentsTest
 *
 * @author gabriel
 */
class AdminCommentsTest extends DuskTestCase
{

    public function test_can_not_access_comments()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/comments')
                    ->assertSee('Password');
        });
    }

    public function test_can_visit_admin_comments_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@codepress.com')
                    ->type('password', '123456')
                    ->press('Login')
                    ->visit('/admin/comments')
                    ->assertSee('Comments');
        });
    }

    public function test_comments_listing()
    {
        $post = Post::create(['title' => 'Post 1', 'content' => 'Conteudo do meu post']);
        $post->user()->associate(1);
        $post->save();
        Comment::create(['content' => 'Comment 1', 'post_id' => $post->id]);
        Comment::create(['content' => 'Comment 2', 'post_id' => $post->id]);
        Comment::create(['content' => 'Comment 3', 'post_id' => $post->id]);
        Comment::create(['content' => 'Comment 4', 'post_id' => $post->id]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/comments')
                    ->assertSee('Comment 1')
                    ->assertSee('Comment 2')
                    ->assertSee('Comment 3')
                    ->assertSee('Comment 4');
        });
        Comment::truncate();
    }

    public function test_can_see_if_can_create_new_comment()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/posts/1')
                    ->assertSee('Want to do a comment?');
        });
    }

    public function test_create_new_comment()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/posts/1')
                    ->type('content', 'My comment')
                    ->press('Comment')
                    ->assertPathIs('/admin/posts/1')
                    ->assertSee('My comment');
        });
    }

    public function test_delete_comment()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/comments')
                    ->press("Delete comment")
                    ->assertDontSee('My comment');
        });
    }

    public function test_click_deleted_comment()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/comments')
                    ->clickLink("Deleted Comments")
                    ->assertPathIs('/admin/comments/deleted');
        });
    }

    public function test_restore_comment()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/comments/deleted')
                    ->clickLink("Restore comment")
                    ->assertPathIs('/admin/comments')
                    ->assertSee('My comment');
        });
    }

}
