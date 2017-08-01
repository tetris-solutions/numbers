<?php

namespace Tetris\Numbers\Generator\Vtex;

use Tetris\Numbers\Generator\Vtex\Extensions\VtexParser;
use Tetris\Numbers\Generator\Vtex\Extensions\VtexTrivialSum;
use Tetris\Numbers\Generator\Shared\MetricFactory;

class VtexMetricFactory extends MetricFactory
{
    protected $platform = 'Vtex';

    function __construct()
    {
        $this->extensions = [
            new VtexParser(),
            new VtexTrivialSum()
        ];
    }
}