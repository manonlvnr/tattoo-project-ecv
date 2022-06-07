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
            
            $table->dateTime('datetime', $precision = 0);

            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('tattooist_id');

            $table->foreign('tattooist_id')
            ->references('id')
            ->on('users');

            $table->foreign('customer_id')
            ->references('id')
            ->on('users');

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
