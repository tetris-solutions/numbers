<?php

namespace Tetris\Numbers\Generator\Facebook\Extensions;

use Tetris\Numbers\Base\Field;
use Tetris\Numbers\Base\Sum\TrivialSum;
use Tetris\Numbers\Generator\Shared\Extension;
use Tetris\Numbers\Generator\Shared\ExtensionApply;

class FacebookTrivialSum implements Extension
{
    use ExtensionApply;

    const fields = [
        'app_store_clicks',
        'call_to_action_clicks',
        'clicks',
        'deeplink_clicks',
        'impressions',
        'newsfeed_clicks',
        'newsfeed_impressions',
        'social_spend',
        'spend',
        'total_unique_actions',
        'unique_clicks',
        'unique_impressions',
        'website_clicks',
        'inline_link_clicks',
        'inline_post_engagement',
        'unique_inline_link_clicks',
        'estimated_ad_recallers',
        'canvas_avg_view_time',
        'canvas_avg_view_percent',
        'video_avg_percent_watched_actions',
        'video_avg_time_watched_actions'
    ];

    function patch(Field $source): array
    {
        $patch = [
            'traits' => []
        ];

        $trivial = in_array($source->id, self::fields);

        if ($trivial) {
            $patch['traits']['sum'] = TrivialSum::class;
        }

        return $patch;
    }
}
