<?php
return [
    "metric" => "unique_impressions",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "unique_impressions"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->unique_impressions);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'unique_impressions'};
            },
            0.0
        );
    }
];
