<?php

namespace Dminustin\BfcPayments;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Dminustin\BfcPayments\Skeleton\SkeletonClass
 */
class BfcPaymentsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bfc-payments';
    }
}
