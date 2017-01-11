<?php
return [
    "metric" => "newsfeed_clicks",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
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
