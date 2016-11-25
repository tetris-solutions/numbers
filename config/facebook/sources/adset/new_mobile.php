<?php
return [
    "metric" => "new_mobile",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'new_mobile') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
