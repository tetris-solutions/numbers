<?php
return [
    "metric" => "clicks",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->clicks);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->clicks;
            },
            0.0
        );
    }
];
