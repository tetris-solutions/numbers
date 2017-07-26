<?php

namespace Tetris\Numbers\Base\Parser;


use Tetris\Numbers\Report\Query\Query;

trait FacebookCPV100Parser
{
    public $actionsProperty;
    public $spendProperty;
    public $actionType;

    function parse($source, Query $queryBase)
    {
        $spend = floatval(str_replace(',', '', $source->{$this->spendProperty}));

        $actionValue = null;

        if (empty($source->{$this->actionsProperty})) return NULL;

        foreach ($source->{$this->actionsProperty} as $action) {
            if ($action['action_type'] === $this->actionType) {
                $actionValue = (float)str_replace(',', '', $action['value']);
                break;
            }
        }

        return !$actionValue ? 0 : $spend / $actionValue;
    }
}