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
        Schema::create('books', function (Blueprint $table) {
            $table->id();

            $table->string('uID')->nullable()->default(null);
            $table->string('title')->nullable()->default(null);
            $table->string('publication')->nullable()->default(null);
            $table->string('appearance')->nullable()->default(null);
            $table->string('frost')->nullable()->default(null);
            $table->string('ISBN')->nullable()->default(null);
            $table->text('notes')->nullable()->default(null);
            $table->text('contents')->nullable()->default(null);
            $table->text('other_title')->nullable()->default(null);
            $table->string('Issue')->nullable()->default(null);
            $table->string('AddedID')->nullable()->default(null);
            $table->string('congressClassification')->nullable()->default(null);
            $table->string('deweyClassification')->nullable()->default(null);
            $table->string('nationalBibliographyNumber')->nullable()->default(null);
            $table->string('year')->nullable()->default(null);
            $table->string('location')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');

    }
};
