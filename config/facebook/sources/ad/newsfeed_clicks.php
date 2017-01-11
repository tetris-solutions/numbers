<?php
return [
    "metric" => "newsfeed_clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "newsfeed_clicks"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'newsfeed_clicks'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'newsfeed_clicks'};
            },
            0.0
        );
    }
];
