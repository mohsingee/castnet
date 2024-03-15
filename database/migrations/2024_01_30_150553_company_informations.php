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
        Schema::create('company_informations', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name')->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('website_address')->nullable();
            $table->integer('number_of_employees')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_zip')->nullable();
            $table->string('billing_country')->nullable();
            $table->boolean('billing_address_check')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('title')->nullable();
            $table->string('primary_phone', 20)->nullable();
            $table->string('primary_email')->nullable();
            $table->string('membership_level')->nullable();
            $table->string('about_organization')->nullable();
            $table->string('ownership_structure')->nullable();
            $table->string('reason_joining')->nullable();
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
        Schema::dropIfExists('company_informations');
    }
};
