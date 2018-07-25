<?php

use CodePress\CodePosts\Models\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
/**
 * Description of CreateCodePostsTable
 *
 * @author gabriel
 */
class CreateCodePostsTable extends Migration
{

    public function up()
    {
        Schema::create('codepress_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->string('slug');
            $table->integer('state')->default(Post::STATE_DRAFT);
            $table->timestamps();
        });
        DB::statement("ALTER TABLE codepress_posts ADD image LONGBLOB AFTER title");
    }

    public function down()
    {
        Schema::dropIfExists('codepress_posts');
    }

}
