<?php
return [
    "metric" => "app_custom_event.fb_mobile_purchase",
    "entity" => "Campaign",
    "fields" => [
        "actions"
    ],
    "report" => "FB_CAMPAIGN",
    "platform" => "facebook",
    "parse" => function ($data) {
        $collection = 'actions';
        $type = 'app_custom_event.fb_mobile_purchase';
    
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
                return $carry + $row->{'app_custom_event.fb_mobile_purchase'};
            },
            0.0
        );
    }
];
