<?php
return [
    "metric" => "app_custom_event.fb_mobile_add_to_wishlist",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "actions"
    ],
    "parse" => function ($data) {
        if (empty($data->actions)) return NULL;
    
        foreach ($data->actions as $action) {
            if ($action['action_type'] === 'app_custom_event.fb_mobile_add_to_wishlist') {
                return (float)str_replace(',', '', $action['value']);
            }
        }
        return NULL;
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'app_custom_event.fb_mobile_add_to_wishlist'};
            },
            0.0
        );
    }
];
