<?php

namespace Dminustin\BfcPayments\Classes;

use Dminustin\BfcCore\Classes\ErrorProvider;
use Dminustin\BfcPayments\BfcPayments;
use Dminustin\BfcPayments\Enums\PaymentErrorsEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController
{
    public function __construct(protected BfcPayments $bfcPayments)
    {
        /*_*/
    }

    /**
     * @throws \Exception
     */
    public function callback(Request $request, string $provider): mixed
    {
        $paymentProvider = $this->bfcPayments->getPaymentProvider($provider);
        if (! $paymentProvider->isEnabled()) {
            throw (new ErrorProvider(Log::getLogger()))->throwException(PaymentErrorsEnum::PROVIDER_NOT_ALLOWED);
        }

        return $paymentProvider->onCallback($request->toArray());
    }
}
