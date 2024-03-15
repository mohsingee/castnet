<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('our_teams', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('profession')->nullable();
            $table->enum('type',[0,1])->nullable();;
            $table->timestamps();
            });
    }

    public function down()
    {
        Schema::dropIfExists('our_teams');
    }
};
