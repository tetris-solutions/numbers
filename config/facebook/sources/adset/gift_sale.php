<?php
return [
    "metric" => "gift_sale",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'gift_sale') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
