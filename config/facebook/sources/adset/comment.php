<?php
return [
    "metric" => "comment",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'comment') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
