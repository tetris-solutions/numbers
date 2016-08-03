<?php
return [
    "metric" => "commerce_event.purchase",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'commerce_event.purchase') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
