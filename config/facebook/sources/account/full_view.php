<?php
return [
    "metric" => "full_view",
    "entity" => "Account",
    "fields" => [
        "actions"
    ],
    "report" => "FB_ACCOUNT",
    "platform" => "facebook",
    "parse" => function ($data) {
        $collection = 'actions';
        $type = 'full_view';
    
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
                return $carry + $row->{'full_view'};
            },
            0.0
        );
    }
];
