<?php

namespace Tetris\Numbers;

use stdClass;

interface Parsable
{
    function parse($source, Query $query): stdClass;
}