<?php

use App\Models\Famer;
use App\Models\Productor;
use App\Models\SeedLot;
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
        Schema::table('alerts', function (Blueprint $table) {
            $table->foreignIdFor(SeedLot::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Famer::class)->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alert', function (Blueprint $table) {
            //
        });
    }
};
