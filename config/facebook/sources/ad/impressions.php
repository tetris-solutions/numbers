<?php
return [
    "metric" => "impressions",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "impressions"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->impressions);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'impressions'};
            },
            0.0
        );
    }
];
