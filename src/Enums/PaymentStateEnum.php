<?php

namespace Dminustin\BfcPayments\Enums;

enum PaymentStateEnum: string
{
    case STATUS_UNKNOWN = 'unknown';
    case STATUS_NEW = 'new';
    case STATUS_IN_PROGRESS = 'in_progress';
    case STATUS_PENDING = 'pending';
    case STATUS_SUCCEEDED = 'succeeded';
    case STATUS_FAILED = 'failed';
}
