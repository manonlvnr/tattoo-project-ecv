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
        Schema::table('users', function (Blueprint $table) {
            $table->increments('id')->change();
            $table->renameColumn('name', 'firstname');
            $table->string('lastname');
            $table->string('username');
            $table->string('email')->nullable()->change();
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

        });
    }

    /**
     * Reverse the migrations.
     * 
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
