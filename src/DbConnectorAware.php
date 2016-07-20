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
     * @var DbConnectorInterface
     */
    protected $dbConnector;

    /**
     * @param DbConnectorInterface $dbConnector
     * @param bool                 $autoConnect
     */
    public function setDbConnector(DbConnectorInterface $dbConnector, $autoConnect = false)
    {
        $this->dbConnector = $dbConnector;
        if ($autoConnect) {
            $this->db = $dbConnector->getConnection();
        }
    }
}
