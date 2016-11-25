<?php
return [
    "metric" => "offsite_conversion.add_to_cart",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'offsite_conversion.add_to_cart') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    }
];
