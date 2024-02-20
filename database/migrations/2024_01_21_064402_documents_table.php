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
            $table->text('document_id')->nullable(); //سرشناسه
            $table->text('author')->nullable(); //عنوان و نام پدیدآور
            $table->text('collection')->nullable(); //مجموعه
            $table->text('replication_status')->nullable(); //وضعیت استنساخ
            $table->text('Replication_specification_note')->nullable(); //یادداشت مشخصات استنساخ
            $table->text('language')->nullable(); // زبان
            $table->text('appearance_characteristics')->nullable(); //مشخصات ظاهری
            $table->text('notes_appearance')->nullable(); //یادداشت مشخصات ظاهری
            $table->text('start_finish_version')->nullable(); //آغاز وانجام نسخه
            $table->text('general_note')->nullable(); //یادداشت کلی
            $table->text('sources_work')->nullable(); //منابع اثر، نمایه ها، چکیده ها
            $table->text('uncontrolled_subjects')->nullable(); //موضوع های کنترل نشده
            $table->text('maintenance_center')->nullable(); //مرکز نگهدارنده
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->text('version_recovery_number')->nullable();//شماره بازیابی نسخه
            $table->text('note')->nullable(); //یادداشت
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
