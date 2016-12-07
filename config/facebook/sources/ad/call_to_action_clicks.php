<?php
return [
    "metric" => "call_to_action_clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "call_to_action_clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->call_to_action_clicks);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'call_to_action_clicks'};
            },
            0.0
        );
    }
];
