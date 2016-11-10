<?php
return [
    "metric" => "link_click",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'link_click') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
