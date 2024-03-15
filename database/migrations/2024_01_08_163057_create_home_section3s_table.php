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
        Schema::create('home_section3s', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('heading')->nullable();
            $table->string('subtitle1')->nullable();
            $table->longText('description1')->nullable();
            $table->string('subtitle2')->nullable();
            $table->longText('description2')->nullable();
            $table->string('subtitle3')->nullable();
            $table->longText('description3')->nullable();
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
        Schema::dropIfExists('home_section3s');
    }
};
