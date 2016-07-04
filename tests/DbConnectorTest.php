<?php

namespace Lidercap\Tests\Component\Db;

use Lidercap\Component\Db\DbConnector;
use Lidercap\Component\Db\DbConnectorInterface;

class DbConnectorTest extends \PHPUnit_Framework_TestCase
{
    public function testInterface()
    {
        $this->assertInstanceOf(DbConnectorInterface::class, new DbConnector);
    }

    public function testGetDsn()
    {
        $hostname = 'hostname-' . rand(1, 100);
        $database = 'database-' . rand(1, 100);

        $dbConnector = new DbConnector();
        $dbConnector->setHostname($hostname);
        $dbConnector->setDatabase($database);

        $this->assertEquals(
            'dblib:host='. $hostname .';dbname=' . $database,
            $dbConnector->getDsn()
        );
    }
}
