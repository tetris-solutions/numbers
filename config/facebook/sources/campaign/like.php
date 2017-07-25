<?php
return [
    "metric" => "like",
    "entity" => "Campaign",
    "fields" => [
        "actions"
    ],
    "report" => "FB_CAMPAIGN",
    "platform" => "facebook",
    "parse" => function ($data) {
        $collection = 'actions';
        $type = 'like';
    
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
                return $carry + $row->{'like'};
            },
            0.0
        );
    }
];
