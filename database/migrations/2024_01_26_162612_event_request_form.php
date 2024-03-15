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
        Schema::create('event_request_form', function (Blueprint $table) {
            $table->id();
            $table->string('event_title')->nullable();
            $table->string('event_category')->nullable();
            $table->string('event_info')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->boolean('event_cost')->nullable();
            $table->string('event_fee')->nullable();
            $table->string('event_contact_FN')->nullable();
            $table->string('event_contact_LN')->nullable();
            $table->string('event_contact_email')->nullable();
            $table->string('telephone', 20)->nullable();
            $table->boolean('area_chamber')->nullable();
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
        Schema::dropIfExists('event_request_form');
    }
};
