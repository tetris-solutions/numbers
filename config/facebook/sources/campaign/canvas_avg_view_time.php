<?php
return [
    "metric" => "canvas_avg_view_time",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "canvas_avg_view_time"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->{'canvas_avg_view_time'});
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'canvas_avg_view_time'};
            },
            0.0
        );
    }
];
