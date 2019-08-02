<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_nodes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id')->unsigned()->index()->references('id')->on('menus');
            $table->integer('parent_id')->default(0)->unsigned()->index();
            $table->integer('related_id')->default(0)->unsigned()->index();
            $table->string('type', 60);
            $table->string('url', 120)->nullable();
            $table->string('css_class', 120)->nullable();
            $table->string('target', 20)->default('_self');
            $table->tinyInteger('has_child')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_nodes');
    }
}
