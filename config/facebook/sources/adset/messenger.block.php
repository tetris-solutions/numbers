<?php
return [
    "metric" => "messenger.block",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'messenger.block') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
