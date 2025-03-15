<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ربط كل مهمة بمستخدم
            $table->string('title'); // عنوان المهمة
            $table->text('description')->nullable(); // وصف المهمة (اختياري)
            $table->enum('status', ['pending', 'in_progress', 'completed'])->default('pending'); // حالة المهمة
            $table->timestamp('due_date')->nullable(); // تاريخ الاستحقاق
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
