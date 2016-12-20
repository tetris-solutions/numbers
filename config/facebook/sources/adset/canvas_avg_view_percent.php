<?php
return [
    "metric" => "canvas_avg_view_percent",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "canvas_avg_view_percent"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->{'canvas_avg_view_percent'});
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'canvas_avg_view_percent'};
            },
            0.0
        );
    }
];
