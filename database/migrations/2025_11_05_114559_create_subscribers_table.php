<?php

use App\Enums\BloodGroupEnum;
use App\Enums\GenderEnum;
use App\Enums\TypeEnum;
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
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->enum('gender', GenderEnum::values());
            $table->enum('bloodGroup', BloodGroupEnum::values());
            $table->string('birthDate');
            $table->string('birthTown');
            $table->string('matricule');
            $table->string('affectation');
            $table->enum('type', TypeEnum::values());
            $table->string('address');
            $table->string('number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribers');
    }
};
