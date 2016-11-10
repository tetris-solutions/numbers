<?php
return [
    "metric" => "leadgen.other",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'leadgen.other') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
