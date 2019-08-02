<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 150);
            $table->integer('language_id')->unsigned()->index();
            $table->integer('part_id')->unsigned()->index();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('part_id')->references('id')->on('parts')->onDelete('cascade');
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
        Schema::dropIfExists('part_descriptions');
    }
}
