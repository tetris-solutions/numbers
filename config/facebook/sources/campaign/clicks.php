<?php
return [
    "metric" => "clicks",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "clicks"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'clicks'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'clicks'};
            },
            0.0
        );
    }
];
