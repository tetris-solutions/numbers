<?php
return [
    "metric" => "estimated_ad_recallers",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "estimated_ad_recallers"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'estimated_ad_recallers'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'estimated_ad_recallers'};
            },
            0.0
        );
    }
];
