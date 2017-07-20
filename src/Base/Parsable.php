<?php

namespace Tetris\Numbers\Base;

use stdClass;

interface Parsable
{
    function parse($source, Query $query): stdClass;
}