<?php

use App\Enums\ConsultationStatusEnum;
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
        Schema::create('laboratories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consultation_id');
            $table->unsignedBigInteger('user_id');

            $table->string('examRequested');
            $table->string('result');
            $table->string('specialNote')->nullable()->default('NULL');
            $table->enum('laboStatus', ConsultationStatusEnum::values());
            $table->timestamps();

            //foreign key
            $table->foreign('consultation_id')
                    ->references('id')
                    ->on('consultations')
                    ->onDelete('cascade');

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratories');
    }
};
