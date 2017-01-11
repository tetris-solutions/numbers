<?php
return [
    "metric" => "offsite_conversion.other",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        if (empty($data->actions)) return NULL;
    
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'offsite_conversion.other') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'offsite_conversion.other'};
            },
            0.0
        );
    }
];
