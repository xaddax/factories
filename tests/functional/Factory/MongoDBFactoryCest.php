<?php
declare(strict_types=1);

namespace Tests\Functional\Factory;

use MongoDB\Client;
use Prophecy\Prophet;
use Psr\Container\ContainerInterface;
use UnitTester;
use Xaddax\Factory\MongoDBFactory;

class MongoDBFactoryCest
{
    public function _before(UnitTester $I, $scenario)
    {
        if (!extension_loaded("mongodb")) {
            $scenario->skip('MongoDB drive is not installed');
        }
    }

    public function testInvokeEnvOnlyNoOptions(UnitTester $I, $scenario)
    {
        $_SERVER['MONGODB_URI'] = 'mongodb://127.0.0.1/';

        $prophet = new Prophet();
        $prophecy = $prophet->prophesize();
        $prophecy->willImplement(ContainerInterface::class);
        $config = [];
        $prophecy->get('config')->willReturn($config);
        $container = $prophecy->reveal();

        /** @var Client $client */
        $client = (new MongoDBFactory)($container);
        $databases = $client->listDatabases();

        $I->assertTrue($databases->valid());
    }
}
