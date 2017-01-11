<?php
return [
    "metric" => "unique_social_impressions",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "unique_social_impressions"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'unique_social_impressions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'unique_social_impressions'};
            },
            0.0
        );
    }
];
