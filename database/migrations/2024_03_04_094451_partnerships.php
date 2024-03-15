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
        Schema::create('partnerships', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('organization_website')->nullable();
            $table->string('industry_sector')->nullable();
            $table->string('partnership_dur')->nullable();
            $table->string('partnership_interest')->nullable();
            $table->string('previous_partnership')->nullable();
            $table->string('past_partnership_details')->nullable();
            $table->string('target_geographic_regions')->nullable();
            $table->string('project_opportunities')->nullable();
            $table->string('non_monetary_support')->nullable();
            $table->string('partnering_goals')->nullable();
            $table->string('expected_outcomes')->nullable();
            $table->string('non_monetary_support_offered')->nullable();
            $table->string('legal_compliance_agree')->nullable();
            $table->string('legal_compliance_understanding')->nullable();
            $table->string('hear_about')->nullable();
            $table->string('additional_information')->nullable();
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
        Schema::dropIfExists('partnerships');
    }
};
