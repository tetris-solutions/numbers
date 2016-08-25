<?php
return [
    "metric" => "new_mobile",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'new_mobile') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
