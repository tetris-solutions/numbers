<?php
return [
    "metric" => "offsite_conversion.key_page_view",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'offsite_conversion.key_page_view') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
