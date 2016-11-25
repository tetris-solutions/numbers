<?php
return [
    "metric" => "follow",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'follow') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
