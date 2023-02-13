<?php

namespace Dminustin\BfcPayments\Enums;

use Dminustin\BfcCore\Classes\ErrorClass;
use Dminustin\BfcCore\Enums\BaseErrorEnum;

enum PaymentErrorsEnum: string implements BaseErrorEnum
{
    case PROVIDER_NOT_FOUND = 'provider_not_found';
    case PROVIDER_NOT_ALLOWED = 'provider_not_allowed';

    public function getError(): ErrorClass
    {
        return match ($this) {
            PaymentErrorsEnum::PROVIDER_NOT_FOUND => (new ErrorClass(self::class))
                ->setMessage('Provider not found')
                ->setLogMessage('Provider not found')
                ->setCode(401),
            PaymentErrorsEnum::PROVIDER_NOT_ALLOWED => (new ErrorClass(self::class))
                ->setMessage('Provider not allowed')
                ->setLogMessage('Provider not allowed')
                ->setCode(401),
        };
    }
}
