<?php

use App\Models\CertificationBody;
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
        Schema::create('seed_lots', function (Blueprint $table) {
            $table->id();
            $table->string('variety');
            $table->string('geographicOrigin');
            $table->date('yearOfHarvest');
            $table->string('processing');
            $table->string('certification');
            $table->double('germinationQuality');
            $table->string('productionSplot');
            $table->double('quantityProduced');
            $table->string('growingConditions');
            $table->boolean('isCertified')->default(false)->nullable();
            $table->foreignIdFor(CertificationBody::class)->nullable()->default(null)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seed_lots');
    }
};
