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
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');

            $table->dateTime('datetime', $precision = 0)->nullable();

            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('tattooist_id');
            $table->unsignedInteger('flash_id');

            $table->foreign('tattooist_id')
            ->references('id')
            ->on('users');

            $table->foreign('customer_id')
            ->references('id')
            ->on('users');

            $table->foreign('flash_id')
            ->references('id')
            ->on('flashes');

            $table->string('event_name')->nullable();
            $table->date('event_start')->nullable();
            $table->date('event_end')->nullable(); 
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
        Schema::dropIfExists('bookings');
    }
};
