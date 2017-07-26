<?php

namespace Tetris\Numbers\Generator\Facebook\Extensions;


use Tetris\Numbers\Base\Parser\ActionParser;
use Tetris\Numbers\Base\Sum\TrivialSum;
use Tetris\Numbers\Generator\Shared\Extension;
use Tetris\Numbers\Generator\Shared\ExtensionApply;
use function Tetris\Numbers\makeParserFromSource;
use function Tetris\Numbers\simpleSum;

class VideoViewParser implements Extension
{
    use ExtensionApply;

    const videoFields = [
        'video_10_sec_watched_actions',
        'video_15_sec_watched_actions',
        'video_30_sec_watched_actions',
        'video_complete_watched_actions',
        'video_p25_watched_actions',
        'video_p50_watched_actions',
        'video_p75_watched_actions',
        'video_p95_watched_actions',
        'video_p100_watched_actions',
        'video_avg_time_watched_actions',
        'video_avg_pct_watched_actions',
        'video_avg_percent_watched_actions',
        'video_avg_sec_watched_actions',
        'cost_per_10_sec_video_view'
    ];

    function __construct()
    {
        foreach (self::videoFields as $videoField) {
            $cfg = [
                'actionsProperty' => $videoField,
                'actionType' => 'video_view',
                'traits' => [
                    'parser' => ActionParser::class
                ],
                'fields' => [$videoField]
            ];

            $isAverage = strpos($videoField, '_avg_') !== FALSE;
            if (!$isAverage) {
                $cfg['traits']['sum'] = TrivialSum::class;
            }

            $this->map[$videoField] = $cfg;
        }
    }
}