<?php
return [
    "metric" => "activeviewctr",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewCtr"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->ActiveViewCtr);
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'activeviewctr'};
            },
            0.0
        );
    }
];
