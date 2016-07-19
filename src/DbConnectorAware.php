<?php

namespace Lidercap\Component\Db;

/**
 * DbConnectorAware e DbConnectionAware não
 * devem conviver juntos na mesma classe.
 */
trait DbConnectorAware
{
    /**
     * @var \PDO
     */
    protected $db;

    /**
     * @var DbConnector
     */
    protected $dbConnector;

    /**
     * @param DbConnector $dbConnector
     * @param bool        $autoConnect
     */
    public function setDbConnector(DbConnector $dbConnector, $autoConnect = false)
    {
        $this->dbConnector = $dbConnector;
        if ($autoConnect) {
            $this->db = $dbConnector->getConnection();
        }
    }
}
