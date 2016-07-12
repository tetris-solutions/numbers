<?php

namespace Tetris\Numbers;

use Aura\Sql\ExtendedPdo;
use Aura\SqlQuery\Common\DeleteInterface;
use Aura\SqlQuery\Common\InsertInterface;
use Aura\SqlQuery\Common\SelectInterface;
use Aura\SqlQuery\Common\UpdateInterface;
use Aura\SqlQuery\QueryFactory;
use Aura\SqlQuery\QueryInterface;
use PDOStatement;

/**
 * @var ExtendedPdo $db
 * @global
 *
 */
$GLOBALS['db'] = $db = new ExtendedPdo(
    'pgsql:host=' . getenv('NUMBERS_DB_HOST') . ';dbname=numbers',
    getenv('NUMBERS_DB_USER'),
    getenv('NUMBERS_DB_PWD')
);

/**
 * @var QueryFactory $query
 * @global
 */
$GLOBALS['query'] = $query = new QueryFactory('pgsql');

class sql
{
    static function select(array $cols): SelectInterface
    {
        global $query;
        return $query->newSelect()->cols($cols);
    }

    static function update(): UpdateInterface
    {
        global $query;
        return $query->newUpdate();
    }

    static function insert(): InsertInterface
    {
        global $query;
        return $query->newInsert();
    }


    static function delete(): DeleteInterface
    {
        global $query;
        return $query->newDelete();
    }

    static function run(QueryInterface $query): PDOStatement
    {
        /**
         * @var ExtendedPdo $db ;
         */
        global $db;
        return $db->perform(
            $query->getStatement(),
            $query->getBindValues()
        );
    }

    static function raw(string $sql, array $boundValues): PDOStatement
    {
        /**
         * @var ExtendedPdo $db ;
         */
        global $db;
        return $db->perform($sql, $boundValues);
    }
}