<?php
return [
    "metric" => "commerce_event.message_to_buy",
    "entity" => "Ad",
    "fields" => [
        "actions"
    ],
    "report" => "FB_AD",
    "platform" => "facebook",
    "parse" => function ($data) {
        $collection = 'actions';
        $type = 'commerce_event.message_to_buy';
    
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
                return $carry + $row->{'commerce_event.message_to_buy'};
            },
            0.0
        );
    }
];
