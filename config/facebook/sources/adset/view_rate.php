<?php
return [
    "metric" => "view_rate",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "video_view",
        "impressions"
    ],
    "parse" => function ($data) {
        $conv = floatval(str_replace(',', '', $data->{'video_view'}));
        $cost = floatval(str_replace(',', '', $data->{'impressions'}));
    
        return $cost === 0.0 ? 0.0 : $conv / $cost;
    },
    "sum" => NULL
];
