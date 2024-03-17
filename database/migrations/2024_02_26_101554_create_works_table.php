<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->string('photo');
            $table->string('link')->unique();
            $table->enum('type', ['facebook', 'youtube']);
            $table->enum('status', ['0', '1'])->default('0');
            // $table->date('date_for_day')->default(Carbon::now()->toDateString());       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};