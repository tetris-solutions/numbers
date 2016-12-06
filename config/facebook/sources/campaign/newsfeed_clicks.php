<?php
return [
    "metric" => "newsfeed_clicks",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "newsfeed_clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->newsfeed_clicks);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->newsfeed_clicks;
            },
            0.0
        );
    }
];
