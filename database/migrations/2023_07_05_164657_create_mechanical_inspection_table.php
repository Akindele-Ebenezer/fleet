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
        Schema::create('mechanical_inspection', function (Blueprint $table) {
            $table->id();
            $table->string("VehicleNumber")->nullable();
            $table->string("InspectionNumber")->nullable();
            $table->string("EngineCondition")->nullable();
            $table->string("BrakeCondition")->nullable();
            $table->string("BrakeEngagingCondition")->nullable();
            $table->string("WiperBladesCondition")->nullable();
            $table->string("BatteryCondition")->nullable(); 
            $table->string("EngineCondition_ActionRequired")->nullable();
            $table->string("BrakeCondition_ActionRequired")->nullable();
            $table->string("BrakeEngagingCondition_ActionRequired")->nullable();
            $table->string("WiperBladesCondition_ActionRequired")->nullable();
            $table->string("BatteryCondition_ActionRequired")->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mechanical_inspection');
    }
};
