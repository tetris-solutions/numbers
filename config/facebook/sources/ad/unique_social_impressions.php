<?php
return [
    "metric" => "unique_social_impressions",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "unique_social_impressions"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->unique_social_impressions);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->unique_social_impressions;
            },
            0.0
        );
    }
];
