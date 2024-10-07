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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->index();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable(); // Can be null for Google users
            $table->string('google_id')->nullable(); // Google OAuth login support
            $table->enum('role', ['user', 'admin', 'store'])->default('user')->index(); // Enum roles
            $table->string('image')->nullable(); // User profile image
            $table->softDeletes(); // Soft deletes column (deleted_at)
            $table->rememberToken(); // Token for "remember me" sessions
            $table->timestamps(); // created_at and updated_at timestamps
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
