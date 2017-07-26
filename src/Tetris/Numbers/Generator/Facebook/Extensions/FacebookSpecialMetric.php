<?php

namespace Tetris\Numbers\Generator\Facebook\Extensions;

use Tetris\Numbers\Generator\Shared\Extension;
use Tetris\Numbers\Generator\Shared\ExtensionApply;
use Tetris\Numbers\Base\Parser\RatioParser;

class FacebookSpecialMetric implements Extension
{
    use ExtensionApply;

    function __construct()
    {
        $this->map = [
            'roas' => RatioParser::spec('total_action_value', 'spend'),
            'cpa' => RatioParser::spec('total_actions', 'total_action_value'),
            'cpr' => RatioParser::spec('spend', 'reach'),
            'cpv100' => \Tetris\Numbers\cpv100Facebook('spend', 'video_p100_watched_actions'),
            'view_rate' => \Tetris\Numbers\viewRateFacebook('actions', 'impressions')
        ];
    }
}