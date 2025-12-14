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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false)->after('email');
            $table->boolean('is_subscribed')->default(false)->after('is_admin');
            $table->timestamp('subscription_ends_at')->nullable()->after('is_subscribed');
            $table->string('subscription_type')->nullable()->after('subscription_ends_at'); // mensuel, annuel
            $table->boolean('email_verified')->default(false)->after('email_verified_at');
            $table->string('verification_token')->nullable()->after('email_verified');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'is_admin',
                'is_subscribed',
                'subscription_ends_at',
                'subscription_type',
                'email_verified',
                'verification_token'
            ]);
        });
    }
};