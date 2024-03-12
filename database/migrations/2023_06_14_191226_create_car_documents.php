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
        Schema::create('car_documents', function (Blueprint $table) {
            $table->id();
            $table->string('VehicleNumber')->nullable();
            $table->string('RegistrationCertificate')->nullable();
            $table->string('RegistrationCertificateSize')->nullable();
            $table->string('DrivingLicence')->nullable();
            $table->string('DrivingLicenceSize')->nullable();
            $table->string('CentralMotorRegistry')->nullable();
            $table->string('CentralMotorRegistrySize')->nullable();
            $table->string('ProofOfOwnership')->nullable();
            $table->string('ProofOfOwnershipSize')->nullable();
            $table->string('CertificateOfRoadWorthiness')->nullable();
            $table->string('CertificateOfRoadWorthinessSize')->nullable();
            $table->string('InsuranceCertificate')->nullable();
            $table->string('InsuranceCertificateSize')->nullable();
            $table->string('DriverLicenseExpiryDate')->nullable();
            $table->string('VehicleLicenseExpiryDate')->nullable();
            $table->string('VehicleLicenseExpiryDate')->nullable();
            $table->string('CentralMotorRegistryExpiryDate')->nullable();
            $table->string('ProofOfOwnershipExpiryDate')->nullable();
            $table->string('CertificateOfRoadWorthinessExpiryDate')->nullable();
            $table->string('InsuranceCertificateExpiryDate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_documents');
    }
};
