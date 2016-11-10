<?php
return [
    "metric" => "estimated_ad_recallers",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "estimated_ad_recallers"
    ],
    "parse" => function ($data) {
        return (float)$data->estimated_ad_recallers;
    }
];
