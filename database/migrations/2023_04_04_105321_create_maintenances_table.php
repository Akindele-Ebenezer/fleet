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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('VehicleNumber')->nullable();
            $table->string('RFLNO')->nullable();
            $table->string('IncidentType')->nullable();
            $table->string('IncidentAction')->nullable();
            $table->string('Details')->nullable();
            $table->string('Date')->nullable();
            $table->string('Time')->nullable();
            $table->string('ReleaseDate')->nullable();
            $table->string('ReleaseTime')->nullable();
            $table->string('Cost')->nullable();
            $table->string('InvoiceNumber')->nullable();
            $table->string('Week')->nullable();
            $table->string('IncidentAttachment')->nullable();
            $table->string('UserId')->nullable();
            $table->string('DateIn')->nullable();
            $table->string('TimeIn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
