<?php
return [
    "metric" => "post_reaction",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'post_reaction') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
