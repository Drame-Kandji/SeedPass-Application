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
        Schema::table('seed_lots', function (Blueprint $table) {
            $table->string('lot_number')->nullable()->unique()->after('id');
            $table->string('image')->nullable();
            $table->string('qr_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seed_lots', function (Blueprint $table) {
            $table->dropColumn(['lot_number', 'image', 'qr_code']);
        });
    }
};
