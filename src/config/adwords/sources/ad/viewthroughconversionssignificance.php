<?php
return [
    "metric" => "viewthroughconversionssignificance",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "ViewThroughConversionsSignificance"
    ],
    "parse" => function ($data): float {
        return (float)$data->ViewThroughConversionsSignificance;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->viewthroughconversionssignificance;
            },
            0.0
        );
    }
];
