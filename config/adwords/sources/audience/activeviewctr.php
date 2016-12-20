<?php
return [
    "metric" => "activeviewctr",
    "entity" => "Audience",
    "platform" => "adwords",
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewCtr"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->ActiveViewCtr);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->activeviewctr;
            },
            0.0
        );
    }
];
