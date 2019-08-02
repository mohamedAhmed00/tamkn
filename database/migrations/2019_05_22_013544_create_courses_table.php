<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image', 255)->nullable();
            $table->float('price');
            $table->tinyInteger('status')->unsigned()->default(1);
            $table->tinyInteger('order')->default(0);
            $table->tinyInteger('feature')->unsigned()->default(1);
            $table->tinyInteger('new')->unsigned()->default(1);
            $table->tinyInteger('certificate')->default(0);
            $table->float('success_grade')->default(0);
            $table->string('icon', 191)->nullable();
            $table->integer('teacher_id')->unsigned()->index();
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->integer('category_id')->unsigned()->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('courses');
    }
}
