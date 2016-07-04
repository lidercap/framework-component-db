<?php

namespace Lidercap\Tests\Component\Db;

use Lidercap\Component\Db\DbConfigAware;

class DbConfigAwareTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DbConfigAware
     */
    protected $trait;

    /**
     * @var array
     */
    protected $mockConfig = [
        'hostname' => 'hostname',
        'database' => 'database',
        'username' => 'username',
        'password' => 'password',
    ];

    public function setUp()
    {
        $this->trait = $this->getMockForTrait(DbConfigAware::class);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Parâmetro de conexão não informado: hostname
     * @expectedExceptionCode -1
     */
    public function testSetConfigExceptionHostname()
    {
        unset($this->mockConfig['hostname']);
        $this->trait->setConfig($this->mockConfig);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Parâmetro de conexão não informado: database
     * @expectedExceptionCode -2
     */
    public function testSetConfigExceptionDatabase()
    {
        unset($this->mockConfig['database']);
        $this->trait->setConfig($this->mockConfig);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Parâmetro de conexão não informado: username
     * @expectedExceptionCode -3
     */
    public function testSetConfigExceptionUsername()
    {
        unset($this->mockConfig['username']);
        $this->trait->setConfig($this->mockConfig);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Parâmetro de conexão não informado: password
     * @expectedExceptionCode -4
     */
    public function testSetConfigExceptionPassword()
    {
        unset($this->mockConfig['password']);
        $this->trait->setConfig($this->mockConfig);
    }

    public function testSetConfig()
    {
        $this->trait->setConfig($this->mockConfig);

        $this->assertEquals($this->mockConfig['hostname'], $this->trait->getHostname());
        $this->assertEquals($this->mockConfig['database'], $this->trait->getDatabase());
        $this->assertEquals($this->mockConfig['username'], $this->trait->getUsername());
        $this->assertEquals($this->mockConfig['password'], $this->trait->getPassword());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Parâmetro de conexão não informado: hostname
     * @expectedExceptionCode -1
     */
    public function testValidateConfigException1()
    {
        $this->trait->validateConfig();
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Parâmetro de conexão não informado: database
     * @expectedExceptionCode -2
     */
    public function testValidateConfigException2()
    {
        $this->trait->setHostname('hostname');
        $this->trait->validateConfig();
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Parâmetro de conexão não informado: username
     * @expectedExceptionCode -3
     */
    public function testValidateConfigException3()
    {
        $this->trait->setHostname('hostname');
        $this->trait->setDatabase('database');
        $this->trait->validateConfig();
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Parâmetro de conexão não informado: password
     * @expectedExceptionCode -4
     */
    public function testValidateConfigException4()
    {
        $this->trait->setHostname('hostname');
        $this->trait->setDatabase('database');
        $this->trait->setUsername('username');
        $this->trait->validateConfig();
    }

    public function testValidateConfigSuccess()
    {
        $this->trait->setHostname('hostname');
        $this->trait->setDatabase('database');
        $this->trait->setUsername('username');
        $this->trait->setPassword('password');
        $this->trait->validateConfig();
    }
}
