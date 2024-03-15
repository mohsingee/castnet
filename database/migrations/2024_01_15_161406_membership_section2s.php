<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('membership_section2s', function (Blueprint $table) {
            $table->id();
            $table->longText('image')->nullable();
            $table->string('heading')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('membership_section2s');
    }
};
