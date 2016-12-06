<?php
return [
    "metric" => "impressionassistedconversionsoverlastclickconversions",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionAssistedConversionsOverLastClickConversions"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->ImpressionAssistedConversionsOverLastClickConversions);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->impressionassistedconversionsoverlastclickconversions;
            },
            0.0
        );
    }
];
