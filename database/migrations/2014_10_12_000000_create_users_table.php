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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('type')->default(0);
            /* Users: 0=>User, 1=>Admin, 2=>Manager */
            $table->date('birthdate')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('tattooist_name')->nullable();
            $table->string('ARS_document')->nullable();
            $table->string('tattoo_parlor')->nullable();
            $table->string('street')->nullable();
            $table->string('street_number')->nullable();
            $table->string('locality')->nullable();
            $table->string('country')->nullable();
            $table->boolean('role')->nullable();
            $table->string('credit_card')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
