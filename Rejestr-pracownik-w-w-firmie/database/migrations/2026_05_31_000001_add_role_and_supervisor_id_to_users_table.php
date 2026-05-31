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
        Schema::table('users', function (Blueprint $table): void {
            $table->string('role')->default('employee')->after('password');
            $table->foreignId('supervisor_id')
                ->nullable()
                ->after('role')
                ->constrained('users')
                ->nullOnDelete();

            $table->index('role');
            $table->index('supervisor_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->dropConstrainedForeignId('supervisor_id');
            $table->dropIndex(['role']);
            $table->dropColumn('role');
        });
    }
};
