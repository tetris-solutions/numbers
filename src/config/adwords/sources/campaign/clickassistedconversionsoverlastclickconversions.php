<?php
return [
    "metric" => "clickassistedconversionsoverlastclickconversions",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ClickAssistedConversionsOverLastClickConversions"
    ],
    "parse" => function ($data): float {
        return (float)$data->ClickAssistedConversionsOverLastClickConversions;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->clickassistedconversionsoverlastclickconversions;
            },
            0.0
        );
    }
];
