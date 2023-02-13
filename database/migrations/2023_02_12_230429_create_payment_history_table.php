<?php

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
        Schema::create('payment_history', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('payment_id')->index();
            $table->uuid('order_id')->index();
            $table->string('payment_state')->default(PaymentStateEnum::STATUS_UNKNOWN->value);
            $table->text('response_text')->nullable();
            $table->integer('response_code')->nullable();
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
        Schema::dropIfExists('payment_history');
    }
};
