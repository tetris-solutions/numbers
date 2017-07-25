<?php

namespace Tetris\Numbers\Generator\Facebook\Extensions;

use Tetris\Numbers\Generator\Shared\Extension;
use Tetris\Numbers\Generator\Shared\ExtensionApply;

class FacebookInferredSum implements Extension
{
    use ExtensionApply;

    function __construct()
    {
        $this->map = [
            'cpc' => \Tetris\Numbers\customRatioSum('spend', 'clicks'),
            'cpm' => \Tetris\Numbers\customRatioSum('spend', 'impressions'),
            'ctr' => \Tetris\Numbers\customRatioSum('clicks', 'impressions'),
            'frequency' => \Tetris\Numbers\customRatioSum('impressions', 'reach'),
            'cost_per_estimated_ad_recallers' => \Tetris\Numbers\customRatioSum('spend', 'estimated_ad_recallers'),
            'cost_per_inline_link_click' => \Tetris\Numbers\customRatioSum('spend', 'inline_link_clicks'),
            'cost_per_inline_post_engagement' => \Tetris\Numbers\customRatioSum('spend', 'inline_post_engagement'),
            'cost_per_total_action' => \Tetris\Numbers\customRatioSum('spend', 'total_actions'),
            'inline_link_click_ctr' => \Tetris\Numbers\customRatioSum('inline_link_clicks', 'impressions'),
            'newsfeed_avg_position' => \Tetris\Numbers\weightedAverage('newsfeed_avg_position', 'impressions'),
            'roas' => \Tetris\Numbers\customRatioSum('total_action_value', 'spend'),
            'cpa' => \Tetris\Numbers\customRatioSum('total_actions', 'total_action_value'),
            'cpr' => \Tetris\Numbers\customRatioSum('spend', 'reach'),
            'cpv100' => \Tetris\Numbers\customRatioSum('spend', 'video_p100_watched_actions'),
            'view_rate' => \Tetris\Numbers\customRatioSum('video_view', 'impressions')
        ];
    }
}
