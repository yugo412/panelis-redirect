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
        Schema::table('slugs', function (Blueprint $table): void {
            $table->integer('hit_count')
                ->default(0)
                ->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('slugs', function (Blueprint $table): void {
            $table->dropColumn('hit_count');
        });
    }
};
