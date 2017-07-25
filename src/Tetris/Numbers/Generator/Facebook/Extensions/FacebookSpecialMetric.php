<?php

namespace Tetris\Numbers\Generator\Facebook\Extensions;

use Tetris\Numbers\Generator\Shared\Extension;
use Tetris\Numbers\Generator\Shared\ExtensionApply;

class FacebookSpecialMetric implements Extension
{
    use ExtensionApply;

    function __construct()
    {
        $this->map = [
            'roas' => \Tetris\Numbers\customRatioParser('total_action_value', 'spend'),
            'cpa' => \Tetris\Numbers\customRatioParser('total_actions', 'total_action_value'),
            'cpr' => \Tetris\Numbers\customRatioParser('spend', 'reach'),
            'cpv100' => \Tetris\Numbers\cpv100Facebook('spend', 'video_p100_watched_actions'),
            'view_rate' => \Tetris\Numbers\viewRateFacebook('actions', 'impressions')
        ];
    }
}