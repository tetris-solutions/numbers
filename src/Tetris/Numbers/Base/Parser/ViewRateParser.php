<?php

namespace Tetris\Numbers\Base\Parser;


use Tetris\Numbers\Report\Query\QueryBase;

trait ViewRateParser
{
    public $actionsProperty;
    public $impressionsProperty;
    public $actionType;

    function parse($source, QueryBase $queryBase)
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
}