<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 400);
            $table->string('sound', 400);
            $table->string('video', 400);
            $table->text('content')->nullable();
            $table->integer('language_id')->unsigned()->index();
            $table->integer('lesson_id')->unsigned()->index();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
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
        Schema::dropIfExists('lesson_descriptions');
    }
}
