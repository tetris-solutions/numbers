<?php
return [
    "metric" => "cost_per_estimated_ad_recallers",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "cost_per_estimated_ad_recallers"
    ],
    "parse" => function ($data) {
        return (float)$data->cost_per_estimated_ad_recallers;
    }
];
