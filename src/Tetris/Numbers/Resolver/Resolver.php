<?php
namespace Tetris\Numbers\Resolver;

use stdClass;
use Tetris\Numbers\Query;

interface Resolver
{
    function __construct(string $tetrisAccount, stdClass $token);

    function resolve(Query $query, bool $aggregateMode): array;
}