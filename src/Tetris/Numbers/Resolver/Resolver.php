<?php
namespace Tetris\Numbers\Resolver;

use stdClass;
use Tetris\Numbers\Report\Query\QueryBase;

interface Resolver
{
    function __construct(string $tetrisAccount, stdClass $token);

    function resolve(QueryBase $query, bool $aggregateMode): array;
}