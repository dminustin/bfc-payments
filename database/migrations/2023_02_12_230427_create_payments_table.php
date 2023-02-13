<?php

use Dminustin\BfcPayments\Enums\CurrencyEnum;
use Dminustin\BfcPayments\Enums\PaymentStateEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('order_id')->index();
            $table->string('payment_provider');
            $table->string('currency', 3)->default(CurrencyEnum::CURRENCY_EUR->value);
            $table->decimal('amount', 24, 12);
            $table->decimal('commission', 24, 12)->default(0);
            $table->string('payment_state')->default(PaymentStateEnum::STATUS_NEW->value);
            $table->json('payment_details')->nullable();
            $table->dateTime('last_checked')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
