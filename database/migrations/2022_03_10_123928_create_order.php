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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('academic_level');
            $table->foreign('academic_level')->references('id')->on('academic_levels');
            $table->unsignedBigInteger('deadline');
            $table->foreign('deadline')->references('id')->on('deadlines');
            $table->unsignedBigInteger('paper_type');
            $table->foreign('paper_type')->references('id')->on('paper_types');
            $table->unsignedBigInteger('discipline');
            $table->foreign('discipline')->references('id')->on('disciplines');
            $table->integer('no_of_pages');
            $table->text('topic');
            $table->text('paper_instruction');
            $table->string('paper_format');
            $table->integer('no_of_sources');
            $table->integer('no_of_charts');
            $table->integer('no_of_power_point_slides');
            $table->double('price_per_page');
            $table->double('total_price');            
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
        Schema::dropIfExists('orders');
    }
};
