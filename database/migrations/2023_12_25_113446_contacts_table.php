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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('bornIN')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->enum('type' , ['researcher', 'causes_of_glory', 'publisher', 'artist'])->default('researcher');
            $table->enum('sex' , ['male' , 'female'])->default('male');
            $table->boolean('congrats')->default(false);
            $table->date('birthday')->nullable()->default(null);
            $table->text('interests')->nullable()->default(null);
            $table->text('other')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');

    }
};
