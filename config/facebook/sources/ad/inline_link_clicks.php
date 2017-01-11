<?php
return [
    "metric" => "inline_link_clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "inline_link_clicks"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'inline_link_clicks'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'inline_link_clicks'};
            },
            0.0
        );
    }
];
