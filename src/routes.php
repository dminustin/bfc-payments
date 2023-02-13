<?php

use Dminustin\BfcPayments\Classes\PaymentController;
use Illuminate\Support\Facades\Route;

Route::prefix(config('bfc-payments.route_prefix'))->group(function () {
    Route::any(
        '/{provider}/callback',
        [PaymentController::class, 'callback']
    )->name(config('bfc-payments.callback_route'));
});
