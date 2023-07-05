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
        Schema::create('interior_inspection', function (Blueprint $table) {
            $table->id();
            $table->string("VehicleNumber")->nullable();
            $table->string("InspectionNumber")->nullable();
            $table->string("SeatBeltsCondition")->nullable();
            $table->string("SeatsCondition")->nullable();
            $table->string("HornCondition")->nullable();
            $table->string("AllControlsCondition")->nullable();
            $table->string("MirrorVisibility")->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interior_inspection');
    }
};
