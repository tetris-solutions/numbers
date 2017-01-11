<?php
return [
    "metric" => "newsfeed_impressions",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "newsfeed_impressions"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'newsfeed_impressions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'newsfeed_impressions'};
            },
            0.0
        );
    }
];
