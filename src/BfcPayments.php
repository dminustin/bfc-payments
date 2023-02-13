<?php

namespace Dminustin\BfcPayments;

use Dminustin\BfcCore\Classes\ErrorProvider;
use Dminustin\BfcPayments\Enums\PaymentErrorsEnum;
use Dminustin\BfcPayments\PaymentProviders\BasePaymentProvider;
use Illuminate\Support\Facades\Log;

class BfcPayments
{
    public function getAvailablePaymentProviders(): array
    {
        return [];
    }

    /**
     * @throws \Exception
     */
    public function getPaymentProvider(string $name): BasePaymentProvider
    {
        $config = config('bfc-payments.payment-providers.'.$name);
        if (empty($config)) {
            throw (new ErrorProvider(Log::getLogger()))->throwException(PaymentErrorsEnum::PROVIDER_NOT_FOUND);
        }
        /** @var BasePaymentProvider */
        return new ($config['class']($config));
    }
}
