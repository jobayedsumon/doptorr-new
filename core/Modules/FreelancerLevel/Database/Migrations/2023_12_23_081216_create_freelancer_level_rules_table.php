<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer_level_rules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('freelancer_level_id');
            $table->integer('period');
            $table->double('avg_rating');
            $table->double('earning');
            $table->integer('complete_order');
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
        Schema::dropIfExists('freelancer_level_rules');
    }
};
