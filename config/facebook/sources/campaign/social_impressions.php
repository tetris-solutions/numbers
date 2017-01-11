<?php
return [
    "metric" => "social_impressions",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "social_impressions"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'social_impressions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'social_impressions'};
            },
            0.0
        );
    }
];
