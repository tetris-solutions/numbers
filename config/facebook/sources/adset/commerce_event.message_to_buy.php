<?php
return [
    "metric" => "commerce_event.message_to_buy",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'commerce_event.message_to_buy') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
