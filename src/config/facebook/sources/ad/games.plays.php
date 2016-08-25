<?php
return [
    "metric" => "games.plays",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'games.plays') {
                return (float)$action['value'];
            }
        }
        return NULL;
    }
];
