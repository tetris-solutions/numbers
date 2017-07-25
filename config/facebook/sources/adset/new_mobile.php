<?php
return [
    "metric" => "new_mobile",
    "entity" => "AdSet",
    "fields" => [
        "actions"
    ],
    "report" => "FB_ADSET",
    "platform" => "facebook",
    "parse" => function ($data) {
        $collection = 'actions';
        $type = 'new_mobile';
    
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
                return $carry + $row->{'new_mobile'};
            },
            0.0
        );
    }
];
