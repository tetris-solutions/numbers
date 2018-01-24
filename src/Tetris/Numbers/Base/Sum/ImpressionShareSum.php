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

            if(is_object($row->{$impressionShareField})){
                $impressionShare = $row->{$impressionShareField}->value;
            }else{
                $impressionShare = $row->{$impressionShareField};
            }

            if (!is_numeric($impressionShare)) return null;

            $possibleImpressions = $row->{$impressionField} / $impressionShare;

            $totalPossibleImpressions += $possibleImpressions;
        }

        return !$totalPossibleImpressions
            ? 0
            : $totalImpressions / $totalPossibleImpressions;
    }

    static function sumSpec($impressions = 'impressions'): array
    {
        return [
            'traits' => [
                'sum' => self::class
            ],
            'impressionsMetric' => $impressions,
            'inferred_from' => [$impressions]
        ];
    }
}
