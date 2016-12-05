<?php
return [
    "metric" => "cost_per_estimated_ad_recallers",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "cost_per_estimated_ad_recallers"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->cost_per_estimated_ad_recallers);
    },
    "sum" => NULL
];
