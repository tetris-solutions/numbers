<?php

namespace Tetris\Numbers\Generator;

use Tetris\Numbers\Base\Metric;

class TransientMetric extends Metric
{
    use Transient;
    use LegacyTransient;
}