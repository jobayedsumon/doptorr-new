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
        Schema::create('promotion_project_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('identity')->nullable();
            $table->string('type')->nullable()->comment('project,profile,proposal');
            $table->integer('package_id');
            $table->double('price')->default(0);
            $table->double('transaction_fee')->nullable();
            $table->bigInteger('duration')->default(0);
            $table->timestamp('expire_date')->nullable();
            $table->string('payment_gateway')->nullable();
            $table->string('payment_status')->nullable();
            $table->integer('status')->default(0);
            $table->string('transaction_id')->nullable();
            $table->string('manual_payment_image')->nullable();
            $table->integer('impression')->default(0);
            $table->integer('click')->default(0);
            $table->string('country')->nullable();
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
        Schema::dropIfExists('promotion_project_lists');
    }
};
