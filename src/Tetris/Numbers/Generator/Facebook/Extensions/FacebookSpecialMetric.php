<?php

namespace Tetris\Numbers\Generator\Facebook\Extensions;

use Tetris\Numbers\Base\Parser\FacebookCPV100Parser;
use Tetris\Numbers\Base\Parser\FacebookCPTotalActionsParser;
use Tetris\Numbers\Base\Parser\ViewRateParser;
use Tetris\Numbers\Generator\Shared\Extension;
use Tetris\Numbers\Generator\Shared\ExtensionApply;
use Tetris\Numbers\Base\Parser\RatioParser;

class FacebookSpecialMetric implements Extension
{
    use ExtensionApply;

    function __construct()
    {
        $this->map = [
            'roas' => RatioParser::parserSpec('total_action_value', 'spend'),
            'cpa' => RatioParser::parserSpec('total_actions', 'total_action_value'),
            'cpr' => RatioParser::parserSpec('spend', 'reach'),
            'cpv100' => FacebookCPV100Parser::parserSpec('spend', 'video_p100_watched_actions'),
            'view_rate' => ViewRateParser::parserSpec('actions', 'impressions'),
            'cost_per_total_action' => FacebookCPTotalActionsParser::parserSpec('spend', 'clicks')
        ];
    }
}