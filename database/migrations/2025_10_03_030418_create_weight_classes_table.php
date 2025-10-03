<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('weight_classes', function (Blueprint $table) {
            $table->id();
            $table->enum('division', ['adult', 'kid']);
            $table->enum('gender', ['male', 'female']);
            $table->foreignId('class_name_id')->constrained('weight_class_names')->cascadeOnDelete();
            $table->decimal('max_weight', 6, 2)->nullable(); // null = no limit
            $table->string('unit')->default('lbs');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('weight_classes');
    }
};
