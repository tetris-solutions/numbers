<?php
return [
    "metric" => "offsite_conversion.fb_pixel_initiate_checkout",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        if (empty($data->actions)) return NULL;
    
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'offsite_conversion.fb_pixel_initiate_checkout') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'offsite_conversion.fb_pixel_initiate_checkout'};
            },
            0.0
        );
    }
];
