<?php

namespace Lidercap\Component\Db;

trait DbConfigAware
{
    /**
     * @var string
     */
    protected $hostname = null;

    /**
     * @var string
     */
    protected $database = null;

    /**
     * @var string
     */
    protected $username = null;

    /**
     * @var string
     */
    protected $password = null;

    /**
     * @return string
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * @param string $hostname the hostname
     */
    public function setHostname($hostname)
    {
        $this->hostname = $hostname;
    }

    /**
     * @return string
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * @param string $database the database
     */
    public function setDatabase($database)
    {
        $this->database = $database;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username the username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password the password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param array $config
     *
     * @throws \InvalidArgumentException
     */
    public function setConfig(array $config)
    {
        if (!isset($config['hostname'])) {
            $message = 'Parâmetro de conexão não informado: hostname';
            throw new \InvalidArgumentException($message, -1);
        }

        if (!isset($config['database'])) {
            $message = 'Parâmetro de conexão não informado: database';
            throw new \InvalidArgumentException($message, -2);
        }

        if (!isset($config['username'])) {
            $message = 'Parâmetro de conexão não informado: username';
            throw new \InvalidArgumentException($message, -3);
        }

        if (!isset($config['password'])) {
            $message = 'Parâmetro de conexão não informado: password';
            throw new \InvalidArgumentException($message, -4);
        }

        $this->setHostname($config['hostname']);
        $this->setDatabase($config['database']);
        $this->setUsername($config['username']);
        $this->setPassword($config['password']);
    }
}
