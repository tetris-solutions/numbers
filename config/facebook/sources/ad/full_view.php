<?php
return [
    "metric" => "full_view",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        if (empty($data->actions)) return NULL;
    
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'full_view') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'full_view'};
            },
            0.0
        );
    }
];
