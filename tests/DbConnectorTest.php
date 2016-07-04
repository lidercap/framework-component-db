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
}
