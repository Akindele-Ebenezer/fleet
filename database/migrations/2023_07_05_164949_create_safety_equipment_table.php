<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('safety_equipment', function (Blueprint $table) {
            $table->id();
            $table->string("VehicleNumber")->nullable();
            $table->string("InspectionNumber")->nullable();
            $table->string("PresenceOfSpareTire")->nullable();
            $table->string("PresenceOfFirstAidKit")->nullable();
            $table->string("FunctionalityOfAllSafetyFeatures")->nullable();
            $table->string("EmergencyLightsCondition")->nullable(); 
            $table->string("PresenceOfSpareTire_ActionRequired")->nullable();
            $table->string("PresenceOfFirstAidKit_ActionRequired")->nullable();
            $table->string("FunctionalityOfAllSafetyFeatures_ActionRequired")->nullable();
            $table->string("EmergencyLightsCondition_ActionRequired")->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('safety_equipment');
    }
};
