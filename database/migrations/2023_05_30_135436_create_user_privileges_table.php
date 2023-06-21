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
        Schema::create('user_privileges', function (Blueprint $table) {
            $table->id();
            $table->integer('UserId');
            $table->string('CarRegistration')->nullable();
            $table->string('AddMaintenance')->nullable();
            $table->string('FuelManagement')->nullable();
            $table->string('MakeDeposits')->nullable();
            $table->string('CardManagement')->nullable();
            $table->string('DocumentManagement')->nullable();
            $table->string('Date')->nullable();
            $table->string('TimeIn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_privileges');
    }
};
