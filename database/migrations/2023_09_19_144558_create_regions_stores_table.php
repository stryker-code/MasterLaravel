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
        Schema::create('regions_stores', function (Blueprint $table) {
            $table->id();

            $table->foreignId('store_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('region_id')
                ->index()
                ->constrained()
                ->cascadeOnDelete();

            /*
            $table->foreign('regions_id')->references('id')
                ->on('regions')->onDelete('cascade');
            $table->foreign('stores_id')->references('id')
                ->on('stores')->onDelete('cascade');
            */

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regions_stores');
    }
};
