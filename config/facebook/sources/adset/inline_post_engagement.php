<?php
return [
    "metric" => "inline_post_engagement",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "inline_post_engagement"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->{'inline_post_engagement'});
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'inline_post_engagement'};
            },
            0.0
        );
    }
];
