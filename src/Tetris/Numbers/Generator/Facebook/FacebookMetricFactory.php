<?php

namespace Tetris\Numbers\Generator\Facebook;

use Tetris\Numbers\Generator\Facebook\Extensions\FacebookInferredSum;
use Tetris\Numbers\Generator\Facebook\Extensions\FacebookSpecialMetric;
use Tetris\Numbers\Generator\Facebook\Extensions\FacebookTrivialSum;
use Tetris\Numbers\Generator\Shared\MetricFactory;
use Tetris\Numbers\Generator\Shared\Extensions\DefaultParser;

class FacebookMetricFactory extends MetricFactory
{
    protected $platform = 'Facebook';

    function __construct()
    {
        parent::__construct();

        $this->extensions = [
            new DefaultParser(),
            new FacebookTrivialSum(),
            new FacebookSpecialMetric(),
            new FacebookInferredSum()
        ];
    }
}