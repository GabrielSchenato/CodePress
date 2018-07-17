<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Description of AddSoftDeleteToCodeCommentsTable
 *
 * @author gabriel
 */
class AddSoftDeleteToCodeCategoriesTable extends Migration
{

    public function up()
    {
        Schema::table('codepress_categories', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('codepress_categories', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }

}
