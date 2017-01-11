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
        if (empty($data->actions)) return NULL;
    
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'games.plays') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'games.plays'};
            },
            0.0
        );
    }
];
