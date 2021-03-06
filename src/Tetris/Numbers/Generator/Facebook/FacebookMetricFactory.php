<?php

namespace Tetris\Numbers\Generator\Facebook;

use Tetris\Numbers\Generator\Facebook\Extensions\ActionsParser;
use Tetris\Numbers\Generator\Facebook\Extensions\FacebookInferredSum;
use Tetris\Numbers\Generator\Facebook\Extensions\FacebookParser;
use Tetris\Numbers\Generator\Facebook\Extensions\FacebookSpecialMetric;
use Tetris\Numbers\Generator\Facebook\Extensions\FacebookTrivialSum;
use Tetris\Numbers\Generator\Facebook\Extensions\VideoViewParser;
use Tetris\Numbers\Generator\Shared\MetricFactory;

class FacebookMetricFactory extends MetricFactory
{
    protected $platform = 'Facebook';

    function __construct()
    {
        $this->extensions = [
            new FacebookParser(),
            new FacebookTrivialSum(),
            new FacebookSpecialMetric(),
            new FacebookInferredSum(),
            new VideoViewParser(),
            new ActionsParser()
        ];
    }
}