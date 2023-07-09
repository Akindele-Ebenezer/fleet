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
        Schema::create('exterior_inspection', function (Blueprint $table) {
            $table->id();
            $table->string("VehicleNumber")->nullable();
            $table->string("InspectionNumber")->nullable();
            $table->string("BodyDamages")->nullable();
            $table->string("TireCondition")->nullable();
            $table->string("WindshieldCondition")->nullable();
            $table->string("LightsCondition")->nullable();
            $table->string("MirrorCondition")->nullable(); 
            $table->string("BodyDamages_ActionRequired")->nullable(); 
            $table->string("TireCondition_ActionRequired")->nullable(); 
            $table->string("WindshieldCondition_ActionRequired")->nullable(); 
            $table->string("LightsCondition_ActionRequired")->nullable(); 
            $table->string("MirrorCondition_ActionRequired")->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exterior_inspection');
    }
};
