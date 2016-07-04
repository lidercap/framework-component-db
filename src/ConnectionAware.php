<?php

namespace Lidercap\Component\Db;

trait ConnectionAware
{
    /**
     * @var \PDO
     */
    protected $db;

    /**
     * @codeCoverageIgnore
     *
     * @param \PDO $db
     */
    public function setDb(\PDO $db)
    {
        $this->db = $db;
    }
}
