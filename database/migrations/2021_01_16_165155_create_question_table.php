<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('text');
            $table->unsignedInteger('Punkte')->nullable();
            $table->date('showDate')->nullable();
            $table->date('endDate')->nullable();
            $table->string('media_url')->nullable();
            $table->unsignedInteger('media_answer')->nullable()->default(0);
            $table->unsignedInteger('time')->default(0)->nullable();
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
        Schema::dropIfExists('question');
    }
}
