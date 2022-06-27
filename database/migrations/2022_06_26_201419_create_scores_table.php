<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->string('season_name');
            $table->string('speaker_name');
            $table->string('speaker_class');
            $table->string('reviewer_name');
            $table->integer('voice_score');
            $table->integer('appearance_score');
            $table->integer('passion_score');
            $table->integer('design_score');
            $table->integer('behavior_score');
            $table->text('comment');
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
        Schema::dropIfExists('scores');
    }
};
