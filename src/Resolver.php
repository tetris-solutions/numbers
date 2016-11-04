<?php
namespace Tetris\Numbers;

use stdClass;

interface Resolver
{
    function __construct(string $tetrisAccount, stdClass $token);

    function resolve(Query $query, bool $aggregateMode): array;
}