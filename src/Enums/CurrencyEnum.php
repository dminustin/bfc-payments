<?php

namespace Dminustin\BfcPayments\Enums;

enum CurrencyEnum: string
{
    case CURRENCY_EUR = 'EUR';
    case CURRENCY_USD = 'USD';
    case CURRENCY_RUB = 'RUB';

    public function precision(): int
    {
        return 2;
    }
}
