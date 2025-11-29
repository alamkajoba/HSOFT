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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscriber_id');
            $table->unsignedBigInteger('user_id');
            $table->float('weight');
            $table->enum('appointmentStatus', ConsultationStatusEnum::values());
            $table->timestamps();

            //foreign key
            $table->foreign('subscriber_id')
                    ->references('id')
                    ->on('subscribers')
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
        Schema::dropIfExists('appointments');
    }
};
