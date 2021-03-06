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
        Schema::create('picture_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename')->nullable();
            $table->string('mime')->nullable();
            $table->string('original_filename')->nullable();

            $table->unsignedInteger('flash_id');
            $table->foreign('flash_id')
            ->references('id')
            ->on('flashes')
            ->nullable();

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->nullable();

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
        Schema::dropIfExists('picture_files');
    }
};
