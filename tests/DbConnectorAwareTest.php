<?php

namespace Lidercap\Tests\Component\Db;

use Lidercap\Component\Db\DbConnector;
use Lidercap\Component\Db\DbConnectorAware;

class DbConnectorAwareTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DbConnectorAware
     */
    protected $trait;

    public function setUp()
    {
        $this->trait = $this->getMockForTrait(DbConnectorAware::class);
    }

    public function testSetDbConnectorAutoConnectDefault()
    {
        $property = new \ReflectionProperty($this->trait, 'dbConnector');
        $property->setAccessible(true);

        $this->assertNull($property->getValue($this->trait));

        $method = new \ReflectionMethod($this->trait, 'setDbConnector');
        $method->setAccessible(true);

        $dbConnectorMock = $this->prophesize(DbConnector::class);
        $method->invokeArgs($this->trait, [$dbConnectorMock->reveal()]);

        $this->assertInstanceOf(DbConnector::class, $property->getValue($this->trait));
    }

    public function testSetDbConnectorAutoConnectFalse()
    {
        $property = new \ReflectionProperty($this->trait, 'dbConnector');
        $property->setAccessible(true);

        $this->assertNull($property->getValue($this->trait));

        $method = new \ReflectionMethod($this->trait, 'setDbConnector');
        $method->setAccessible(true);

        $dbConnectorMock = $this->prophesize(DbConnector::class);
        $method->invokeArgs($this->trait, [$dbConnectorMock->reveal(), false]);

        $this->assertInstanceOf(DbConnector::class, $property->getValue($this->trait));
    }

    public function testSetDbConnectorAutoConnectTrue()
    {
        $property = new \ReflectionProperty($this->trait, 'db');
        $property->setAccessible(true);

        $this->assertNull($property->getValue($this->trait));

        $PDOMock = $this->prophesize(\PDO::class);

        $dbConnectorMock = $this->prophesize(DbConnector::class);
        $dbConnectorMock->getConnection()->shouldBeCalled()->willReturn($PDOMock->reveal());

        $method = new \ReflectionMethod($this->trait, 'setDbConnector');
        $method->setAccessible(true);

        $method->invokeArgs($this->trait, [$dbConnectorMock->reveal(), true]);

        $this->assertInstanceOf(\PDO::class, $property->getValue($this->trait));
    }
}
