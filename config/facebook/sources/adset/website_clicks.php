<?php
return [
    "metric" => "website_clicks",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "website_clicks"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'website_clicks'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'website_clicks'};
            },
            0.0
        );
    }
];
