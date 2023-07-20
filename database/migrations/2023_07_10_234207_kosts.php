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
        Schema::create('kosts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            // $table->text('images');
            $table->string('region');
            $table->text('address');
            $table->text('facilities');
            $table->string('location')->nullable();
            $table->bigInteger('price_start_month')->nullable();
            $table->bigInteger('price_start_year')->nullable();
            $table->string('owner');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
