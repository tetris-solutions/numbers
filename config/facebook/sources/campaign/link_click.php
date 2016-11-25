<?php
return [
    "metric" => "link_click",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'link_click') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
