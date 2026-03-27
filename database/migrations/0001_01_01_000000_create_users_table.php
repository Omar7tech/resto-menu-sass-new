<?php


use App\Enums\UserRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Create the application's users, password_reset_tokens, and sessions database tables.
     *
     * - users: ULID `id` primary key; `name`; nullable unique `email`; nullable unique `phone_number`;
     *   nullable `email_verified_at` timestamp; `password`; unsigned tiny integer `role` defaulting to UserRole::CLIENT->value;
     *   `remember_token`; `created_at` and `updated_at` timestamps.
     * - password_reset_tokens: `email` primary key; `token`; nullable `created_at` timestamp.
     * - sessions: string `id` primary key; nullable indexed `user_id` foreign key; nullable `ip_address` (45);
     *   nullable `user_agent`; `payload` long text; indexed `last_activity`.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->string('phone_number')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedTinyInteger(column: 'role')->default(UserRole::CLIENT->value);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
