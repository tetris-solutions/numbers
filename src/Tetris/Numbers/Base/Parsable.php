<?php

namespace Tetris\Numbers\Base;


use Tetris\Numbers\Report\Query\QueryBase;

interface Parsable
{
    function parse($source, QueryBase $query);
}