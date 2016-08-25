<?php
return [
    "metric" => "gift_sale",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'gift_sale') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
