<?php
return [
    "metric" => "cpv100",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "spend",
        "video_p100_watched_actions"
    ],
    "parse" => function ($data) {
        $conv = floatval(str_replace(',', '', $data->{'spend'}));
        $cost = floatval(str_replace(',', '', $data->{'video_p100_watched_actions'}));
    
        return $cost === 0.0 ? 0.0 : $conv / $cost;
    },
    "sum" => NULL
];
