<?php

namespace Lidercap\Component\Db;

trait DbConnectorAware
{
    /**
     * @var DbConnector
     */
    protected $dbConnector;

    /**
     * @codeCoverageIgnore
     *
     * @param DbConnector $dbConnector
     */
    protected function setDbConnector(DbConnector $dbConnector)
    {
        $this->dbConnector = $dbConnector;
    }
}
