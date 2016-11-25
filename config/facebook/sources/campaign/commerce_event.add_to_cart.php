<?php
return [
    "metric" => "commerce_event.add_to_cart",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'commerce_event.add_to_cart') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
