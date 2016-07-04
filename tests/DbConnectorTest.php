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

    public function testConstruct()
    {
        $hostname = 'hostname-' . rand(1, 100);
        $database = 'database-' . rand(1, 100);
        $username = 'username-' . rand(1, 100);
        $password = 'password-' . rand(1, 100);

        $dbConnector = new DbConnector([
            'hostname' => $hostname,
            'database' => $database,
            'username' => $username,
            'password' => $password,
        ]);

        $this->assertEquals($hostname, $dbConnector->getHostname());
        $this->assertEquals($database, $dbConnector->getDatabase());
        $this->assertEquals($username, $dbConnector->getUsername());
        $this->assertEquals($password, $dbConnector->getPassword());
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
