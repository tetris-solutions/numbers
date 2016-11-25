<?php
return [
    "metric" => "comment",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'comment') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
