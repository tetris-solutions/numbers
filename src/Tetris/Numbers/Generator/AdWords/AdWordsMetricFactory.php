<?php

namespace Tetris\Numbers\Generator\AdWords;

use Tetris\Numbers\Generator\AdWords\Extensions\AdWordsTrivialSum;
use Tetris\Numbers\Generator\AdWords\Extensions\AdWordsSpecialMetric;
use Tetris\Numbers\Generator\AdWords\Extensions\AdWordsInferredSum;
use Tetris\Numbers\Generator\Shared\Extensions\DefaultParser;
use Tetris\Numbers\Generator\Shared\MetricFactory;

class AdWordsMetricFactory extends MetricFactory
{
    protected $platform = 'AdWords';

    function __construct(array $fields)
    {
        $this->extensions = [
            new DefaultParser(),
            new AdWordsTrivialSum(),
            new AdWordsSpecialMetric($fields),
            new AdWordsInferredSum()
        ];
    }
}
