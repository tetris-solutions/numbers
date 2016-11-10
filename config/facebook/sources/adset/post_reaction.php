<?php
return [
    "metric" => "post_reaction",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'post_reaction') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
