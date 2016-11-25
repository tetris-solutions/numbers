<?php
return [
    "metric" => "full_view",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'full_view') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
