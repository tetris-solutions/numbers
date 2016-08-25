<?php
return [
    "metric" => "post_like",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'post_like') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
