<?php

namespace Dminustin\BfcPayments\PaymentProviders;

use Dminustin\BfcPayments\Enums\CurrencyEnum;

abstract class BasePaymentProvider
{
    protected string $providerName = '';

    protected string $providerId = '';

    protected string $provider_LOGO = '';

    protected string $merchantCommission = '0';

    protected string $providerCommission = '0';

    protected array $config;

    /**@const CurrencyEnum */
    public CurrencyEnum $currency;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function calculateMerchantCommission(string $amount): string
    {
        return round(
            (float) $amount *
            (float) $this->merchantCommission / 100,
            (float) $this->currency->precision()
        );
    }

    public function calculateProviderCommission(string $amount): string
    {
        return round(
            (float) $amount *
            (float) $this->merchantCommission / 100,
            (float) $this->currency->precision()
        );
    }

    abstract public function createPayment();

    abstract public function isEnabled(): bool;

    abstract public function onCallback(array $data): mixed;

    abstract public function checkPaymentStatus();

    abstract public static function getPaymentsToCheck(int $limit = 10): array;

    /**
     * @return string
     */
    public function getProviderName(): string
    {
        return $this->providerName;
    }

    /**
     * @return string
     */
    public function getProviderId(): string
    {
        return $this->providerId;
    }

    /**
     * @return string
     */
    public function getProviderLOGO(): string
    {
        return $this->provider_LOGO;
    }

    /**
     * @return string
     */
    public function getMerchantCommission(): string
    {
        return $this->merchantCommission;
    }

    /**
     * @return string
     */
    public function getProviderCommission(): string
    {
        return $this->providerCommission;
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @return CurrencyEnum
     */
    public function getCurrency(): CurrencyEnum
    {
        return $this->currency;
    }
}
