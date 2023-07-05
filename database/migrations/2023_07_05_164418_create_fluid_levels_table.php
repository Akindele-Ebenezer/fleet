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
        Schema::create('fluid_levels', function (Blueprint $table) {
            $table->id();
            $table->string("VehicleNumber")->nullable();
            $table->string("InspectionNumber")->nullable();
            $table->string("EngineOilCondition")->nullable();
            $table->string("CoolantLevelCondition")->nullable();
            $table->string("BrakeFluidLevelCondition")->nullable();
            $table->string("WindshieldWasherFluidCondition")->nullable();
            $table->string("PowerSteeringFluidLevelCondition")->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fluid_levels');
    }
};
