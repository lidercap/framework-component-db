<?php

namespace Lidercap\Component\Db;

/**
 * Conector de banco de dados.
 */
class DbConnector implements DbConnectorInterface
{
    use DbConfigAware;

    /**
     * @var array
     */
    protected $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_CASE               => \PDO::CASE_LOWER,
    ];

    /**
     * @param array|null $config
     */
    public function __construct(array $config = null)
    {
        if (!is_null($config)) {
            $this->setConfig($config);
        }
    }

    /**
     * @return string
     */
    public function getDsn()
    {
        return sprintf('dblib:host=%s;dbname=%s', $this->hostname, $this->database);
    }

    /**
     * @codeCoverageIgnore
     *
     * @return \PDO
     */
    public function getConnection()
    {
        $dsn = $this->getDsn();

        $db = new \PDO($dsn, $this->username, $this->password, $this->options);
        $db->exec('SET ANSI_PADDING ON');
        $db->exec('SET ANSI_WARNINGS ON');
        $db->exec('SET CONCAT_NULL_YIELDS_NULL ON');

        return $db;
    }
}
