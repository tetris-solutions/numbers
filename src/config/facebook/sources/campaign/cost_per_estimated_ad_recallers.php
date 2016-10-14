<?php
return [
    "metric" => "cost_per_estimated_ad_recallers",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "cost_per_estimated_ad_recallers"
    ],
    "parse" => function ($data) {
        return (float)$data->cost_per_estimated_ad_recallers;
    }
];
