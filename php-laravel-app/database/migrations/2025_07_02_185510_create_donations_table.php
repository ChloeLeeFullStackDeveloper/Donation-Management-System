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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donor_id')->constrained()->onDelete('cascade');
            $table->foreignId('campaign_id')->nullable()->constrained('donation_campaigns')->onDelete('set null');
            $table->decimal('amount', 10, 2);
            $table->enum('donation_type', ['one-time', 'recurring'])->default('one-time');
            $table->enum('fund_restriction', ['unrestricted', 'restricted'])->default('unrestricted');
            $table->string('fund_purpose', 200)->nullable();
            $table->string('transaction_id', 100)->nullable();
            $table->timestamp('donation_date')->useCurrent();
            $table->boolean('receipt_sent')->default(false);
            $table->string('receipt_number', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
