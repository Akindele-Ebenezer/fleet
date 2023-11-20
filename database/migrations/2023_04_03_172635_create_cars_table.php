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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('VehicleNumber')->nullable();
            $table->string('Maker')->nullable();
            $table->string('Model')->nullable();
            $table->string('SubModel')->nullable();
            $table->string('GearType')->nullable();
            $table->string('EngineType')->nullable();
            $table->string('EngineNumber')->nullable();
            $table->string('ChassisNumber')->nullable();
            $table->string('ModelYear')->nullable();
            $table->string('Odometer')->nullable();
            $table->string('EngineVolume')->nullable();
            $table->text('Comments')->nullable();
            $table->string('PIC')->nullable();
            $table->string('PurchaseDate')->nullable();
            $table->string('Price')->nullable();
            $table->string('UserId')->nullable();
            $table->string('DateIn')->nullable();
            $table->string('TimeIn')->nullable();
            $table->string('Supplier')->nullable();
            $table->string('CarOwner')->nullable();
            $table->string('Driver')->nullable();
            $table->string('CardNumber')->nullable();
            $table->string('MonthlyBudget')->nullable();
            $table->string('CompanyCode')->nullable();
            $table->string('TotalDeposits')->nullable();
            $table->string('TotalRefueling')->nullable();
            $table->string('TotalRefuelingCar')->nullable();
            $table->string('Balance')->nullable();
            $table->string('PinCode')->nullable();
            $table->string('TotalMaster')->nullable();
            $table->string('Status')->nullable();
            $table->string('CardVendor')->nullable();
            $table->string('StopDate')->nullable();
            $table->string('LicenceExpiryDate')->nullable();
            $table->string('InsuranceExpiryDate')->nullable();
            $table->string('FIN')->nullable();
            $table->string('FuelTankCapacity')->nullable();
            $table->string('DocI')->nullable();
            $table->string('CPATH')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
