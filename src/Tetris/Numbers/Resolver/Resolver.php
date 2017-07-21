<?php
namespace Tetris\Numbers\Resolver;

use stdClass;
use Tetris\Numbers\Report\Query\Base;

interface Resolver
{
    function __construct(string $tetrisAccount, stdClass $token);

    function resolve(Base $query, bool $aggregateMode): array;
}