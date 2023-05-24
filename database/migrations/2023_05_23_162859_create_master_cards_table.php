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
        Schema::create('master_cards', function (Blueprint $table) {
            $table->id();
            $table->string('Date')->nullable();
            $table->string('CardNumber')->nullable();
            $table->string('Amount')->nullable();
            $table->string('Year')->nullable();
            $table->string('Week')->nullable();
            $table->string('Month')->nullable();
            $table->string('Status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_cards');
    }
};
