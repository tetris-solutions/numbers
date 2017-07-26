<?php

namespace Tetris\Numbers\Base\Parser;


use Tetris\Numbers\Report\Query\Query;

trait ViewRateParser
{
    public $actionsProperty;
    public $impressionsProperty;
    public $actionType;

    function parse($source, Query $queryBase)
    {
        $impressions = floatval(str_replace(',', '', $source->{$this->impressionsProperty}));

        $actionValue = null;

        if (empty($source->{$this->actionsProperty})) return NULL;

        foreach ($source->{$this->actionsProperty} as $action) {
            if ($action['action_type'] === $this->actionType) {
                $actionValue = (float)str_replace(',', '', $action['value']);
                break;
            }
        }

        return !$impressions ? 0 : $actionValue / $impressions;
    }

    static function parserSpec(string $videoViewAction, string $impressions): array
    {
        return [
            'actionsProperty' => $videoViewAction,
            'impressionsProperty' => $impressions,
            'actionType' => 'video_view',
            'traits' => [
                'parser' => self::class
            ],
            'fields' => [$impressions, $videoViewAction]
        ];
    }
}