<?php
return [
    "metric" => "app_custom_event.fb_mobile_add_payment_info",
    "entity" => "Account",
    "fields" => [
        "actions"
    ],
    "report" => "FB_ACCOUNT",
    "platform" => "facebook",
    "parse" => function ($data) {
        $collection = 'actions';
        $type = 'app_custom_event.fb_mobile_add_payment_info';
    
        if (empty($data->{$collection})) return NULL;
    
        foreach ($data->{$collection} as $action) {
            if ($action['action_type'] === $type) {
                return (float)str_replace(',', '', $action['value']);
            }
        }
    
        return NULL;
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'app_custom_event.fb_mobile_add_payment_info'};
            },
            0.0
        );
    }
];
