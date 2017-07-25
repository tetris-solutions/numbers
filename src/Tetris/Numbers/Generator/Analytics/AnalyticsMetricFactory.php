<?php

namespace Tetris\Numbers\Generator\Analytics;

use Tetris\Numbers\Generator\Analytics\Extensions\AnalyticsParser;
use Tetris\Numbers\Generator\Analytics\Extensions\AnalyticsTrivialSum;
use Tetris\Numbers\Generator\Shared\MetricFactory;

class AnalyticsMetricFactory extends MetricFactory
{
    protected $platform = 'Analytics';

    function __construct()
    {
        parent::__construct();

        $this->extensions = [
            new AnalyticsParser(),
            new AnalyticsTrivialSum()
        ];
    }
}