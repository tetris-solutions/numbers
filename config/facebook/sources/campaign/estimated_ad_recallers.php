<?php
return [
    "metric" => "estimated_ad_recallers",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "estimated_ad_recallers"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->estimated_ad_recallers);
    },
    "sum" => NULL
];
