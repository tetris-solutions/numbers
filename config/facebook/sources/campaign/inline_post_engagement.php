<?php
return [
    "metric" => "inline_post_engagement",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "inline_post_engagement"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'inline_post_engagement'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'inline_post_engagement'};
            },
            0.0
        );
    }
];
