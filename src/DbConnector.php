<?php

namespace Lidercap\Component\Db;

class DbConnector implements DbConnectorInterface
{
    use DbConfigAware;

    /**
     * @return \PDO
     */
    public function getConnection()
    {

    }
}
