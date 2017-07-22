<?php
return [
    "metric" => "costpercurrentmodelattributedconversion",
    "entity" => "Campaign",
    "fields" => [
        "CostPerCurrentModelAttributedConversion"
    ],
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'CostPerCurrentModelAttributedConversion'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'costpercurrentmodelattributedconversion'};
            },
            0.0
        );
    }
];
