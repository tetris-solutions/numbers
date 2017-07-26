<?php

namespace Tetris\Numbers\Base\Sum;

trait VideoQuartileSum
{
    /**
     * @var string
     */
    public $videoViewsMetric;
    /**
     * @var string
     */
    public $videoQuartileMetric;

    function sum(array $rows)
    {
        $totalViews = 0;
        $partialViews = 0;

        foreach ($rows as $row) {
            $totalViews += $row->{$this->videoViewsMetric};
            $partialViews += $row->{$this->videoViewsMetric} * $row->{$this->videoQuartileMetric};
        }

        return (float)$totalViews !== 0.0
            ? $partialViews / $totalViews
            : 0;
    }

    static function sumSpec(string $percent): array
    {
        $quartile = "videoquartile{$percent}rate";

        return [
            'traits' => [
                'sum' => self::class
            ],
            'videoViewsMetric' => 'videoviews',
            'videoQuartileMetric' => $quartile,
            "inferred_from" => ['videoviews']
        ];
    }
}
