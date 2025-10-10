<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('role', ['admin', 'supervisor', 'teacher']);
            $table->foreignId('school_id')->nullable()->constrained('schools')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('users');
    }
};
