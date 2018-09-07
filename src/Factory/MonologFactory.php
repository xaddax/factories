<?php
declare(strict_types=1);

namespace Xaddax\Factory;

use Monolog\Logger;
use Psr\Container\ContainerInterface;

final class MonologFactory
{
    public function __invoke(ContainerInterface $container): Logger
    {
        return new Logger('log');
    }
}