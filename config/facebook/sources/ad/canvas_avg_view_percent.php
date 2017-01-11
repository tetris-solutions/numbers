<?php
return [
    "metric" => "canvas_avg_view_percent",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "canvas_avg_view_percent"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'canvas_avg_view_percent'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'canvas_avg_view_percent'};
            },
            0.0
        );
    }
];
