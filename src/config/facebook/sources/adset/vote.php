<?php
return [
    "metric" => "vote",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'vote') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
