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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->integer('subscriberId');
            $table->string('symptomPatient')->nullable();
            $table->string('PhysicalExam')->nullable();
            $table->string('vitalSign')->nullable();
            $table->string('labExam')->nullable()->default('NULL');
            $table->string('radioExam')->nullable()->default('NULL');
            $table->string('treatment');
            $table->string('specialNote')->nullable()->default('NULL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
