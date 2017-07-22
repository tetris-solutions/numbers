<?php
return [
    "metric" => "activeviewctr",
    "entity" => "Campaign",
    "fields" => [
        "ActiveViewCtr"
    ],
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ActiveViewCtr'}));
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
