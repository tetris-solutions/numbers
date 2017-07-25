<?php
return [
    "metric" => "offsite_conversion.fb_pixel_search",
    "entity" => "Account",
    "fields" => [
        "actions"
    ],
    "report" => "FB_ACCOUNT",
    "platform" => "facebook",
    "parse" => function ($data) {
        $collection = 'actions';
        $type = 'offsite_conversion.fb_pixel_search';
    
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
                return $carry + $row->{'offsite_conversion.fb_pixel_search'};
            },
            0.0
        );
    }
];
