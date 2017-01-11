<?php
return [
    "metric" => "impressionassistedconversionsoverlastclickconversions",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionAssistedConversionsOverLastClickConversions"
    ],
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
