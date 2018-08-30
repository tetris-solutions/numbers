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
            'cpc' => RatioSum::sumSpec('spend', 'clicks'),
            'cpm' => RatioSum::sumSpec('spend', 'impressions'),
            'ctr' => RatioSum::sumSpec('clicks', 'impressions'),
            'frequency' => RatioSum::sumSpec('impressions', 'reach'),
            'cost_per_estimated_ad_recallers' => RatioSum::sumSpec('spend', 'estimated_ad_recallers'),
            'cost_per_inline_link_click' => RatioSum::sumSpec('spend', 'inline_link_clicks'),
            'cost_per_inline_post_engagement' => RatioSum::sumSpec('spend', 'inline_post_engagement'),
            'cost_per_total_action' => RatioSum::sumSpec('spend', 'clicks'),
            'inline_link_click_ctr' => RatioSum::sumSpec('inline_link_clicks', 'impressions'),
            'newsfeed_avg_position' => WeightedSum::sumSpec('impressions'),
            'roas' => RatioSum::sumSpec('total_action_value', 'spend'),
            'cpa' => RatioSum::sumSpec('total_actions', 'total_action_value'),
            'cpr' => RatioSum::sumSpec('spend', 'reach'),
            'cpv100' => RatioSum::sumSpec('spend', 'video_p100_watched_actions'),
            'view_rate' => RatioSum::sumSpec('video_view', 'impressions')
        ];
    }
}
