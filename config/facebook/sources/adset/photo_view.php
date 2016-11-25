<?php
return [
    "metric" => "photo_view",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'photo_view') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
