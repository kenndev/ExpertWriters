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
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('paperstatus')->nullable();
            $table->foreign('paperstatus')->references('id')->on('status');
            $table->integer('client_ready')->default(0);
            $table->integer('display_writer')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['paperstatus']);
            $table->dropColumn('paperstatus');
            $table->dropColumn('client_ready');
            $table->dropColumn('display_writer');
        });
    }
};
