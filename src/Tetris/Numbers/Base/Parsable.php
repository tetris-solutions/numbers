<?php

namespace Tetris\Numbers\Base;

use stdClass;
use Tetris\Numbers\Query;

interface Parsable
{
    function parse($source, Query $query): stdClass;
}