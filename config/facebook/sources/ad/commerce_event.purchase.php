<?php
return [
    "metric" => "commerce_event.purchase",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'commerce_event.purchase') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
