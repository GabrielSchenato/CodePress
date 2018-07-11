<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Description of CreateCodeCommentsTable
 *
 * @author gabriel
 */
class CreateCodeCommentsTable extends Migration
{

    public function up()
    {
        Schema::create('codepress_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('post_id');
            $table->foreign('post_id')->references('id')->on('codepress_posts');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('codepress_comments');
    }

}
