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
        Schema::create('papers', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable()->default(null);
            $table->string('publication')->nullable()->default(null);
            $table->string('magazine')->nullable()->default(null);
            $table->string('magazineRate')->nullable()->default(null);
            $table->string('year')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('papers');

    }
};
