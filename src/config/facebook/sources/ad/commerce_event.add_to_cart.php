<?php
return [
    "metric" => "commerce_event.add_to_cart",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'commerce_event.add_to_cart') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
