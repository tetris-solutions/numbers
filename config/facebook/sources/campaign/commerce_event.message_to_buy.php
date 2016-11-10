<?php
return [
    "metric" => "commerce_event.message_to_buy",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'commerce_event.message_to_buy') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
