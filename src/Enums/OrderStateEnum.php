<?php

namespace Dminustin\BfcPayments\Enums;

enum OrderStateEnum: string
{
    case STATUS_IN_PROGRESS = 'IN_PROGRESS'; // — В работе.
    case STATUS_PAID = 'PAID'; // — Оплачен
    case STATUS_CANCELLED = 'CANCELLED'; // — Отменен
    case STATUS_SPAM = 'SPAM'; // — Спам
}
