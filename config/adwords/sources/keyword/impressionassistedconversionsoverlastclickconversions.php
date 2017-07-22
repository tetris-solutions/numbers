<?php
return [
    "metric" => "impressionassistedconversionsoverlastclickconversions",
    "entity" => "Keyword",
    "fields" => [
        "ImpressionAssistedConversionsOverLastClickConversions"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ImpressionAssistedConversionsOverLastClickConversions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'impressionassistedconversionsoverlastclickconversions'};
            },
            0.0
        );
    }
];
