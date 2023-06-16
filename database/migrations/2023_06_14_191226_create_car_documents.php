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
            $table->string('PUCCertificate')->nullable();
            $table->string('PUCCertificateSize')->nullable();
            $table->string('ProofOfOwnership')->nullable();
            $table->string('ProofOfOwnershipSize')->nullable();
            $table->string('CertificateOfRoadWorthiness')->nullable();
            $table->string('CertificateOfRoadWorthinessSize')->nullable();
            $table->string('InsuranceCertificate')->nullable();
            $table->string('InsuranceCertificateSize')->nullable();
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
