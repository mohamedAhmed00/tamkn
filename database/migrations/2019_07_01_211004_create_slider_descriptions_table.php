<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 120);
            $table->text('description', 255)->nullable();
            $table->integer('language_id')->unsigned()->index();
            $table->integer('slider_id')->unsigned()->index();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('slider_id')->references('id')->on('sliders')->onDelete('cascade');
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
        Schema::dropIfExists('slider_descriptions');
    }
}
