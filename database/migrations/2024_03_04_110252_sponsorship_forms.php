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
        Schema::create('sponsorship_forms', function (Blueprint $table) {
            $table->id();
            $table->string('sponsor_name')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('email_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('website_url')->nullable();
            $table->string('industry_sector')->nullable();
            $table->string('specific_interest')->nullable();
            $table->string('geographic_focus')->nullable();
            $table->string('sponsorship_level')->nullable();
            $table->string('sponsorship_goals')->nullable();
            $table->string('sponsorship_experiences')->nullable();
            $table->string('sponsorship_preferences')->nullable();
            $table->string('sponsorship_budget')->nullable();
            $table->string('payment_schedule')->nullable();
            $table->string('additional_support')->nullable();
            $table->string('hear_about')->nullable();
            $table->string('data_protection_consent')->nullable();
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
        Schema::dropIfExists('sponsorship_forms');
    }
};
