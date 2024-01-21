<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('document_id')->nullable(); //سرشناسه
            $table->string('author')->nullable(); //عنوان و نام پدیدآور
            $table->string('collection')->nullable(); //مجموعه
            $table->string('replication_status')->nullable(); //وضعیت استنساخ
            $table->string('Replication_specification_note')->nullable(); //یادداشت مشخصات استنساخ
            $table->string('language')->nullable(); // زبان
            $table->string('appearance_characteristics')->nullable(); //مشخصات ظاهری
            $table->string('notes_appearance')->nullable(); //یادداشت مشخصات ظاهری
            $table->string('start_finish_version')->nullable(); //آغاز وانجام نسخه
            $table->string('general_note')->nullable(); //یادداشت کلی
            $table->string('sources_work')->nullable(); //منابع اثر، نمایه ها، چکیده ها
            $table->string('uncontrolled_subjects')->nullable(); //موضوع های کنترل نشده
            $table->string('maintenance_center')->nullable(); //مرکز نگهدارنده
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('version_recovery_number')->nullable();//شماره بازیابی نسخه
            $table->string('note')->nullable(); //یادداشت
            $table->text('other')->nullable(); //اطلاعات اضافی
            $table->string('image')->nullable();
            $table->timestamps();








//            $table->string('document_number')->nullable();

//            $table->string('source')->nullable();
//            $table->string('date')->nullable();
//            $table->string('another_title')->nullable();
//            $table->string('inflectional_title')->nullable();
//            $table->string('name')->nullable();
//            $table->string('creator')->nullable();
//            $table->string('replication')->nullable();
//            $table->string('Replication_specification_note')->nullable();
//            $table->string('language')->nullable();
//            $table->string('appearance_characteristics')->nullable();
//            $table->string('notes_appearance')->nullable();
//            $table->string('general_note')->nullable();
//            $table->string('sources_work')->nullable();
//            $table->string('uncontrolled_subjects')->nullable();
//            $table->string('maintenance_center')->nullable();
//            $table->string('country')->nullable();
//            $table->string('city')->nullable();
//            $table->string('version_recovery_number')->nullable();
//            $table->string('note')->nullable();
//            $table->string('start_finish_version')->nullable();
//            $table->string('introducing_version')->nullable();
//            $table->string('scope_content')->nullable();
//            $table->string('descriptor')->nullable();
//            $table->string('publication')->nullable();
//            $table->string('frost')->nullable();
//            $table->string('ISBN')->nullable();
//            $table->string('contents')->nullable();
//            $table->string('subject')->nullable();
//            $table->string('added_ID')->nullable();
//            $table->string('congress_classification')->nullable();
//            $table->string('dewey_classification')->nullable();
//            $table->string('national_bibliography_number')->nullable();
//            $table->string('status_editor')->nullable();
//            $table->string('image')->nullable();
//
//            $table->unsignedBigInteger('editedBy')->nullable();
//            $table->foreign('editedBy')->references('id')->on('users')->onUpdate('null')->onDelete('null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
