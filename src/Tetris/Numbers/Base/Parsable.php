<?php

namespace Tetris\Numbers\Base;


use Tetris\Numbers\Report\Query\Query;

interface Parsable
{
    function parse($source, Query $query);
}