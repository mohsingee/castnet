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
        //
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('banner')->nullable();
            $table->string('short_heading')->nullable();
            $table->string('heading')->nullable();
            $table->string('description')->nullable();
            $table->string('button1')->nullable();
            $table->text('button1link')->nullable();
            $table->string('button2')->nullable();
            $table->text('button2link')->nullable();
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
        Schema::dropIfExists('banners');
    }
};
