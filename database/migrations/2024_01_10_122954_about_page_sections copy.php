<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('about_page_sections', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->string('sectionname')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_page_sections');
    }
};
