<?php
return [
    "metric" => "clickassistedconversionsoverlastclickconversions",
    "entity" => "Campaign",
    "fields" => [
        "ClickAssistedConversionsOverLastClickConversions"
    ],
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ClickAssistedConversionsOverLastClickConversions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'clickassistedconversionsoverlastclickconversions'};
            },
            0.0
        );
    }
];
