<?php
return [
    "metric" => "canvas_avg_view_time",
    "entity" => "Campaign",
    "fields" => [
        "canvas_avg_view_time"
    ],
    "report" => "FB_CAMPAIGN",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'canvas_avg_view_time'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'canvas_avg_view_time'};
            },
            0.0
        );
    }
];
