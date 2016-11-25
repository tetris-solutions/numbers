<?php
return [
    "metric" => "estimated_ad_recallers",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "estimated_ad_recallers"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->estimated_ad_recallers);
    }
];
