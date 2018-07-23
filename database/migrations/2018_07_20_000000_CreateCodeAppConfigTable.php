<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use CodePress\CodeApp\Models\AppConfig;

class CreateCodeAppConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codepress_appconfig', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('options');
            $table->timestamps();
        });
        
        $model = new AppConfig();
        $options = [
            'frontLayout' => ''
        ];
        $model->options = $options;
        $model->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codepress_appconfig');
    }
}
