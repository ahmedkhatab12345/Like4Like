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
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
        $table->unsignedBigInteger('customer_id');
        $table->string('phone_number');
        $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        $table->decimal('withdrawal_amount', 10, 2);
        $table->enum('status', ['pending', 'accept', 'rejected'])->default('pending');
        $table->enum('methoud', ['cach', 'insta']);
        $table->string('photo')->nullable();

        $table->timestamps();
        });
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};
