<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Description of CreateCodeAddUsersToCommentsTable
 *
 * @author gabriel
 */
class CreateCodeAddUsersToCommentsTable extends Migration
{

    public function up()
    {
        Schema::table('codepress_comments', function (Blueprint $table) {
            $table->integer('user_id')->default(0);
            $table->foreign('user_id')->references('id')->on('codepress_users');
        });
    }

    public function down()
    {
        Schema::table('codepress_comments', function (Blueprint $table) {
            $table->dropForeign('codepress_comments_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }

}
