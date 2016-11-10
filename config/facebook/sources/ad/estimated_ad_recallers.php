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
        return (float)$data->estimated_ad_recallers;
    }
];
