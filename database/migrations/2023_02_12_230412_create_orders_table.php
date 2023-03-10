<?php

use Dminustin\BfcPayments\Enums\CurrencyEnum;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('user_id');
            $table->string('currency', 3)->default(CurrencyEnum::CURRENCY_EUR->value);
            $table->decimal('amount', 24, 12);
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
        Schema::dropIfExists('orders');
    }
};
