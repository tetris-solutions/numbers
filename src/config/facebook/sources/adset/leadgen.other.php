<?php
return [
    "metric" => "leadgen.other",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'leadgen.other') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
