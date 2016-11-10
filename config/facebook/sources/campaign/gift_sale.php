<?php
return [
    "metric" => "gift_sale",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
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
