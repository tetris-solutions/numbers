<?php
return [
    "metric" => "estimated_ad_recall_rate",
    "entity" => "Campaign",
    "fields" => [
        "estimated_ad_recall_rate"
    ],
    "report" => "FB_CAMPAIGN",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'estimated_ad_recall_rate'}));
    }
];
