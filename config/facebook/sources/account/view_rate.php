<?php
return [
    "metric" => "view_rate",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "impressions",
        "actions"
    ],
    "parse" => function ($data) {
        $collection = 'actions';
        $type = 'video_view';
    
        $impressions = floatval(str_replace(',', '', $data->{'impressions'}));
    
        $actionValue = null;
    
        if (empty($data->{$collection})) return NULL;
    
        foreach ($data->{$collection} as $action) {
            if ($action['action_type'] === $type) {
                $actionValue = (float)str_replace(',', '', $action['value']);
                break;
            }
        }
    
        return !$impressions ? 0 : $actionValue / $impressions;
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'video_view';
        $divisorMetric = 'impressions';
    
        $sumDividend = 0;
        $sumDivisor = 0;
    
        foreach ($rows as $row) {
            $sumDividend += $row->{$dividendMetric};
            $sumDivisor += $row->{$divisorMetric};
        }
    
        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    },
    "inferred_from" => [
        "video_view",
        "impressions"
    ]
];
