<?php
return [
    "metric" => "contentbudgetlostimpressionshare",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ContentBudgetLostImpressionShare"
    ],
    "parse" => function ($data): array {
        $value = $data->{'ContentBudgetLostImpressionShare'};
    
        if (!is_string($value)) {
            return [
                'value' => null,
                'raw' => $value
            ];
        }
    
        $multiplier = 1;
    
        if (strpos($value, '%') !== FALSE) {
            $multiplier = 0.01;
        }
    
        $clean = preg_replace("/[^0-9,.]/", "", $value);
    
        return [
            'value' => is_numeric($clean)
                ? floatval($clean) * $multiplier
                : null,
            'raw' => $value
        ];
    }
];
