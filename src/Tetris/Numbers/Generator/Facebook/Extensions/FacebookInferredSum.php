<?php

namespace Tetris\Numbers\Generator\Facebook\Extensions;

use Tetris\Numbers\Base\Sum\RatioSum;
use Tetris\Numbers\Base\Sum\WeightedSum;
use Tetris\Numbers\Generator\Shared\Extension;
use Tetris\Numbers\Generator\Shared\ExtensionApply;

class FacebookInferredSum implements Extension
{
    use ExtensionApply;

    function __construct()
    {
        $this->map = [
            'cpc' => RatioSum::spec('spend', 'clicks'),
            'cpm' => RatioSum::spec('spend', 'impressions'),
            'ctr' => RatioSum::spec('clicks', 'impressions'),
            'frequency' => RatioSum::spec('impressions', 'reach'),
            'cost_per_estimated_ad_recallers' => RatioSum::spec('spend', 'estimated_ad_recallers'),
            'cost_per_inline_link_click' => RatioSum::spec('spend', 'inline_link_clicks'),
            'cost_per_inline_post_engagement' => RatioSum::spec('spend', 'inline_post_engagement'),
            'cost_per_total_action' => RatioSum::spec('spend', 'total_actions'),
            'inline_link_click_ctr' => RatioSum::spec('inline_link_clicks', 'impressions'),
            'newsfeed_avg_position' => WeightedSum::spec('impressions'),
            'roas' => RatioSum::spec('total_action_value', 'spend'),
            'cpa' => RatioSum::spec('total_actions', 'total_action_value'),
            'cpr' => RatioSum::spec('spend', 'reach'),
            'cpv100' => RatioSum::spec('spend', 'video_p100_watched_actions'),
            'view_rate' => RatioSum::spec('video_view', 'impressions')
        ];
    }
}
