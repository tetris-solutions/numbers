<?php
return [
    "metric" => "estimated_ad_recallers",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "estimated_ad_recallers"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->{'estimated_ad_recallers'});
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'estimated_ad_recallers'};
            },
            0.0
        );
    }
];
