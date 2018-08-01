<?php
declare(strict_types=1);

namespace Xaddax\Factory;

use MongoDB\Client;
use Psr\Container\ContainerInterface;
use Xaddax\Interactor\GatherConfigValues;

final class MongoDBFactory
{
    public function __invoke(ContainerInterface $container): Client
    {
        $values = (new GatherConfigValues)($container, 'mongodb');
        $uriOptions = $values['uriOptions'] ?? [];
        $driverOptions = $values['driverOptions'] ?? [];

        return new Client($values['uri'], $uriOptions, $driverOptions);
    }
}