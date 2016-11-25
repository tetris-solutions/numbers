<?php
return [
    "metric" => "vote",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'vote') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
