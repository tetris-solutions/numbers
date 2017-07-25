<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\QueryBase;

trait ActionParser
{
    public $actionsProperty;
    public $actionType;

    function parse($source, QueryBase $queryBase)
    {
        if (empty($source->{$this->actionsProperty})) return NULL;

        foreach ($source->{$this->actionsProperty} as $action) {
            if ($action['action_type'] === $this->actionType) {
                return (float)str_replace(',', '', $action['value']);
            }
        }

        return null;
    }
}
