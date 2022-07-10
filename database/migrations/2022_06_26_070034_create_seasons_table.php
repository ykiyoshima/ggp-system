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
        Schema::create('seasons', function (Blueprint $table) {
            $table->id();
            $table->string('season_name');
            $table->string('season_theme');
            $table->date('season_date');
            $table->string('speaker1_name')->nullable();
            $table->string('speaker1_class')->nullable();
            $table->string('speaker2_name')->nullable();
            $table->string('speaker2_class')->nullable();
            $table->string('speaker3_name')->nullable();
            $table->string('speaker3_class')->nullable();
            $table->string('speaker4_name')->nullable();
            $table->string('speaker4_class')->nullable();
            $table->string('speaker5_name')->nullable();
            $table->string('speaker5_class')->nullable();
            $table->boolean('is_done');
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
        Schema::dropIfExists('seasons');
    }
};
