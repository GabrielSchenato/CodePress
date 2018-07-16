<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Description of CreateCodeCategoriesTable
 *
 * @author gabriel
 */
class CreateCodeCategorizablesTable extends Migration
{

    public function up()
    {
        Schema::create('codepress_categorizables', function (Blueprint $table) {
            $table->integer('category_id');
            $table->integer('categorizable_id');
            $table->string('categorizable_type');
        });
    }

    public function down()
    {
        Schema::dropIfExists('codepress_categorizables');
    }

}
