<?php
return [
    "metric" => "full_view",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'full_view') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
