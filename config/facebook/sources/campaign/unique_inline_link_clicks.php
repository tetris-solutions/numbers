<?php
return [
    "metric" => "unique_inline_link_clicks",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "unique_inline_link_clicks"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'unique_inline_link_clicks'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'unique_inline_link_clicks'};
            },
            0.0
        );
    }
];
