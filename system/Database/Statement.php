<?php
/**
 * Statement
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 * @date January 16th, 2016
 */

namespace Nova\Database;

use Nova\Database\Connection;

use \PDO;

/**
 * PDOStatement decorator that logs when a PDOStatement is executed.
 */
class Statement
{
    /**
     * The Connection link.
     */
    private $connection;

    /**
     * The PDOStatement we decorate.
     */
    private $statement;

    /**
     * The Query bind parameters.
     */
    private $parameters;


    public function __construct(PDOStatement $statement, Connection $connection, array $parameters = array())
    {
        $this->statement  = $statement;
        $this->connection = $connection;
        $this->parameters = $parameters;
    }

    /**
    * When execute is called record the time it takes and
    * then log the query
    * @return PDO result set
    */
    public function execute($params = null)
    {
        $start = microtime(true);

        $result = $this->statement->execute($params);

        $this->connection->logQuery($this->statement->queryString, $start, $this->parameters);

        return $result;
    }

    /**
    * Other than execute pass all other calls to the PDOStatement object
    * @param string $function_name
    * @param array $parameters arguments
    */
    public function __call($method, $params)
    {
        return call_user_func_array(array($this->statement, $method), $params);
    }

    public function __get($name)
    {
        return $this->statement->$name;
    }

}
