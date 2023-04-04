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
        Schema::create('refuelings', function (Blueprint $table) {
            $table->string('VehicleNumber')->nullable();
            $table->string('RFLNO');
            $table->string('Date')->nullable();
            $table->string('Time')->nullable();
            $table->string('KMETER')->nullable();
            $table->string('TERNO')->nullable();
            $table->string('ReceiptNumber')->nullable(); 
            $table->string('Quantity')->nullable();
            $table->string('Amount')->nullable();
            $table->string('CardNumber')->nullable();
            $table->string('UserId')->nullable();
            $table->string('DateIn')->nullable();
            $table->string('TimeIn')->nullable();
            $table->string('KM')->nullable();
            $table->string('Consumption')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refuelings');
    }
};
