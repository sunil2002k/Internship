<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('referrer_id')
                  ->nullable()
                  ->after('id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->string('status')->default('active')->after('password');
            $table->index('status');
            $table->index(['referrer_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['referrer_id', 'created_at']);
            $table->dropIndex('users_status_index');
            
            // Drop columns and foreign rules safely
            $table->dropColumn('status');
            $table->dropForeign(['referrer_id']);
            $table->dropColumn('referrer_id');
        });
    }
};
