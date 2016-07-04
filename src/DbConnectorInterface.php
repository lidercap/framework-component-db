<?php

namespace Lidercap\Component\Db;

/**
 * Interface para conectores de bancos de dados.
 */
interface DbConnectorInterface
{
    /**
     * Gets the value of hostname.
     *
     * @return string
     */
    public function getHostname();

    /**
     * Sets the value of hostname.
     *
     * @param string $hostname the hostname
     */
    public function setHostname($hostname);

    /**
     * Gets the value of database.
     *
     * @return string
     */
    public function getDatabase();

    /**
     * Sets the value of database.
     *
     * @param string $database the database
     */
    public function setDatabase($database);

    /**
     * Gets the value of username.
     *
     * @return string
     */
    public function getUsername();

    /**
     * Sets the value of username.
     *
     * @param string $username the username
     */
    public function setUsername($username);

    /**
     * Gets the value of password.
     *
     * @return string
     */
    public function getPassword();

    /**
     * Sets the value of password.
     *
     * @param string $password the password
     */
    public function setPassword($password);

    /**
     * @param array $config
     *
     * @throws \InvalidArgumentException
     */
    public function setConfig(array $config);

    /**
     * @return \PDO
     */
    public function getConnection();
}
