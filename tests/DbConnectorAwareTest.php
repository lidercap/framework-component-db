<?php

namespace Lidercap\Tests\Component\Db;

use Lidercap\Component\Db\DbConnectorInterface;
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

        $dbConnectorMock = $this->prophesize(DbConnectorInterface::class);
        $this->trait->setDbConnector($dbConnectorMock->reveal());

        $this->assertInstanceOf(DbConnectorInterface::class, $property->getValue($this->trait));
    }

    public function testSetDbConnectorAutoConnectFalse()
    {
        $property = new \ReflectionProperty($this->trait, 'dbConnector');
        $property->setAccessible(true);

        $this->assertNull($property->getValue($this->trait));

        $dbConnectorMock = $this->prophesize(DbConnectorInterface::class);
        $this->trait->setDbConnector($dbConnectorMock->reveal(), false);

        $this->assertInstanceOf(DbConnectorInterface::class, $property->getValue($this->trait));
    }

    public function testSetDbConnectorAutoConnectTrue()
    {
        $property = new \ReflectionProperty($this->trait, 'db');
        $property->setAccessible(true);

        $this->assertNull($property->getValue($this->trait));

        $PDOMock = $this->prophesize(\PDO::class);

        $dbConnectorMock = $this->prophesize(DbConnectorInterface::class);
        $dbConnectorMock->getConnection()->shouldBeCalled()->willReturn($PDOMock->reveal());

        $this->trait->setDbConnector($dbConnectorMock->reveal(), true);
        $this->assertInstanceOf(\PDO::class, $property->getValue($this->trait));
    }
}
