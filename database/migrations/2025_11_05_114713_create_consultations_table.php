<?php

use App\Enums\ConsultationStatusEnum;
use App\Enums\LabExamStatusEnum;
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
            $table->string('symptomPatient');
            $table->string('PhysicalExam');
            $table->string('vitalSign')->nullable();
            $table->string('labExam')->nullable()->default('NULL');
            $table->string('labResult')->nullable();
            $table->string('radioExam')->nullable()->default('NULL');
            $table->string('radioResult')->nullable();
            $table->string('treatment')->nullable();
            $table->string('specialNote')->nullable()->default('NULL');
            $table->enum('LabExamStatusEnum', ConsultationStatusEnum::cases());
            //$table->string('RadioExamStatusEnum');
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
