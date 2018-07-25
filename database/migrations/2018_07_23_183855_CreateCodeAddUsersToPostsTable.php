<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Description of CreateCodeCommentsTable
 *
 * @author gabriel
 */
class CreateCodeAddUsersToPostsTable extends Migration
{

    public function up()
    {
        Schema::table('codepress_posts', function (Blueprint $table) {
            $table->integer('user_id')->default(1)->unsigned();
            $table->foreign('user_id')->references('id')->on('codepress_users');
        });
    }

    public function down()
    {
        Schema::table('codepress_posts', function (Blueprint $table) {
            $table->dropForeign('codepress_posts_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }

}
