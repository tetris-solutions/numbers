<?php
return [
    "metric" => "link_click",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
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
