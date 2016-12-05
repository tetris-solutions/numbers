<?php
return [
    "metric" => "website_clicks",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "website_clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->website_clicks);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->website_clicks;
            },
            0.0
        );
    }
];
