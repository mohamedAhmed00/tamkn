<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuNodeDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_node_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 120)->nullable();
            $table->integer('language_id')->unsigned()->index();
            $table->integer('menu_node_id')->unsigned()->index();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('menu_node_id')->references('id')->on('menu_nodes')->onDelete('cascade');
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
        Schema::dropIfExists('menu_node_descriptions');
    }
}
