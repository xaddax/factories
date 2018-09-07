<?php
declare(strict_types=1);

namespace Xaddax\Factory;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Psr\Container\ContainerInterface;
use Xaddax\Interactor\GatherConfigValues;

final class DBALConnectionFactory
{
    public function __invoke(ContainerInterface $container): Connection
    {
        $values = (new GatherConfigValues)($container, 'database');

        $connectionParams = [
            'dbname'   => $values['name'],
            'user'     => $values['user'],
            'password' => $values['password'],
            'host'     => $values['host'],
            'driver'   => $values['driver'],
            'port'     => $values['port'],
        ];

        return DriverManager::getConnection($connectionParams);
    }
}