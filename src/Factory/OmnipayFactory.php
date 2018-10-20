<?php
declare(strict_types=1);

namespace Xaddax\Factory;

use Omnipay\Common\GatewayInterface;
use Psr\Container\ContainerInterface;

final class OmnipayFactory
{
    public function __invoke(ContainerInterface $container): GatewayInterface
    {
        $config = $container->get('config');
        $omnipayConfig = $config['omnipay'];
        $driver = $omnipayConfig['driver'];
        $factory = 'Xaddax\\Factory\\Omnipay\\' . ucfirst($driver) . 'Factory';

        return (new $factory)($omnipayConfig);
    }
}