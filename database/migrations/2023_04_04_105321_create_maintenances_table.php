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
            $table->string('VehicleNumber')->nullable();
            $table->string('RFLNO');
            $table->string('MaintenanceAction')->nullable();
            $table->string('Details')->nullable();
            $table->string('Date')->nullable();
            $table->string('Time')->nullable();
            $table->string('ReleaseDate')->nullable();
            $table->string('ReleaseTime')->nullable();
            $table->string('Cost')->nullable();
            $table->string('InvoiceNumber')->nullable();
            $table->string('Week')->nullable();
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
