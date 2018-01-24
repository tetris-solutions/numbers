<?php

namespace Tetris\Numbers\Base\Sum;

trait LostImpressionShareSum
{
    public $impressionShareMetric;
    public $impressionsMetric;

    function sum(array $rows)
    {
        $lostImpressionShareField = $this->id;
        $impressionShareField = $this->impressionShareMetric;
        $impressionField = $this->impressionsMetric;

        $totalPossibleImpressions = 0;
        $totalLostImpressions = 0;

        foreach ($rows as $row) {

            if(is_object($row->{$impressionShareField})){
                $impressionShare = $row->{$impressionShareField}->value;
            }else{
                $impressionShare = $row->{$impressionShareField};
            }

            if(is_object($row->{$lostImpressionShareField})){
                $lostShare = $row->{$lostImpressionShareField}->value;
            }else{
                $lostShare = $row->{$lostImpressionShareField};
            }

            if (!is_numeric($impressionShare) || !is_numeric($lostShare)) {
                return null;
            }

            $possibleImpressions = $row->{$impressionField} / $impressionShare;

            $totalPossibleImpressions += $possibleImpressions;
            $totalLostImpressions += $possibleImpressions * $lostShare;
        }

        return !$totalPossibleImpressions
            ? 0
            : $totalLostImpressions / $totalPossibleImpressions;
    }

    static function sumSpec(string $impressionShare, $impressions = 'impressions'): array
    {
        return [
            'traits' => [
                'sum' => self::class
            ],
            'impressionShareMetric' => $impressionShare,
            'impressionsMetric' => $impressions,
            'inferred_from' => [$impressionShare, $impressions]
        ];
    }
}