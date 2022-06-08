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
        Schema::create('flashes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->integer('price');
            $table->boolean('color');
            $table->boolean('active');
            $table->integer('order')->nullable();


            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedInteger('tattooist_id');

            $table->foreign('tattooist_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('customer_id')
            ->references('id')
            ->on('users');
            

            $table->unsignedInteger('skin_id')->nullable();
            $table->foreign('skin_id')
            ->references('id')
            ->on('flashes')
            ->nullable();

            $table->timestamps();

            $table->unsignedInteger('category_flashes_id');
            $table->foreign('category_flashes_id')
            ->references('id')
            ->on('category_flashes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('flashes');
    }
};
