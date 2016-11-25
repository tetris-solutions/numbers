<?php
return [
    "metric" => "tab_view",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'tab_view') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
