<?php
return [
    "metric" => "social_impressions",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "social_impressions"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->{'social_impressions'});
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'social_impressions'};
            },
            0.0
        );
    }
];
