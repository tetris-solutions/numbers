<?php
return [
    "metric" => "impressionassistedconversionsoverlastclickconversions",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionAssistedConversionsOverLastClickConversions"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->ImpressionAssistedConversionsOverLastClickConversions);
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
