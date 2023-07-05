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
        Schema::create('inspection_report', function (Blueprint $table) {
            $table->id();
            $table->string("VehicleNumber")->nullable();
            $table->string("InspectionNumber")->nullable();
            $table->string("Mileage")->nullable();
            $table->string("DateInspected")->nullable();
            $table->string("VehicleMake")->nullable();
            $table->string("VehicleModel")->nullable();
            $table->string("Driver")->nullable();
            $table->string("InspectedBy")->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspection_report');
    }
};
