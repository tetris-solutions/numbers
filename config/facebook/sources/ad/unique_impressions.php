<?php
return [
    "metric" => "unique_impressions",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "unique_impressions"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'unique_impressions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'unique_impressions'};
            },
            0.0
        );
    }
];
