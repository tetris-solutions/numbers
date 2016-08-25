<?php
return [
    "metric" => "mention",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'mention') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
