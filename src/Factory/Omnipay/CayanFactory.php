<?php
declare(strict_types=1);

namespace Xaddax\Factory\Omnipay;

use Omnipay\Cayan\Gateway;
use Omnipay\Omnipay;

final class CayanFactory
{
    public function __invoke(array $config): Gateway
    {
        $merchantKey = getenv('OMNIPAY_MERCHANT_KEY');
        $merchantName = getenv('OMNIPAY_MERCHANT_NAME');
        $merchantSiteId = getenv('OMNIPAY_MERCHANT_SITE_ID');

        /** @var Gateway $gateway */
        $gateway = Omnipay::create('Cayan');
        $gateway
            ->setCurrency($config['currency'])
            ->setProductionEndPoint($config['productionEndpoint'])
            ->setMerchantKey($merchantKey)
            ->setMerchantName($merchantName)
            ->setMerchantSiteId($merchantSiteId);

        return $gateway;
    }
}