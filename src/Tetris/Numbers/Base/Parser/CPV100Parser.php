<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Report\Query\Query;

trait CPV100Parser
{
    public $costProperty;
    public $views100PercentileProperty;
    public $viewsProperty;

    function parse($source, Query $query)
    {
        $cost = floatval(str_replace(',', '', $source->{$this->costProperty}));
        $fullViewPercent = str_replace(['%', ','], '', $source->{$this->views100PercentileProperty});
        $fullViewPercent = floatval($fullViewPercent) / 100;

        $allViews = intval(str_replace(',', '', $source->{$this->viewsProperty}));

        $fullViews = $allViews * $fullViewPercent;

        return $fullViews === 0.0 ? 0.0 : $cost / $fullViews;
    }
}
