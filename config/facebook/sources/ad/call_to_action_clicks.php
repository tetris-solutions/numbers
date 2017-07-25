<?php
return [
    "metric" => "call_to_action_clicks",
    "entity" => "Ad",
    "fields" => [
        "call_to_action_clicks"
    ],
    "report" => "FB_AD",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'call_to_action_clicks'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'call_to_action_clicks'};
            },
            0.0
        );
    }
];
