<?php

namespace Tetris\Numbers\Base\Sum;


trait ImpressionShareSum
{
    public $impressionsMetric;

    function sum(array $rows)
    {
        $impressionShareField = $this->id;
        $impressionField = $this->impressionsMetric;

        $totalPossibleImpressions = 0;
        $totalImpressions = 0;

        foreach ($rows as $row) {
            $totalImpressions += $row->{$impressionField};

            $impressionShare = $row->{$impressionShareField};

            if (!is_numeric($impressionShare)) return null;

            $possibleImpressions = $row->{$impressionField} / $impressionShare;

            $totalPossibleImpressions += $possibleImpressions;
        }

        return !$totalPossibleImpressions
            ? 0
            : $totalImpressions / $totalPossibleImpressions;
    }
}
