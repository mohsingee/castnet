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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('organization')->nullable();
            $table->string('castnet_visit')->nullable();
            $table->string('sector')->nullable();
            $table->string('challenge')->nullable();
            $table->string('membership_info')->nullable();
            $table->string('contact_info')->nullable();
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('experiences');
    }
};
