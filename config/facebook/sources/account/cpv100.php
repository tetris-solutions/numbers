<?php
return [
    "metric" => "cpv100",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "spend",
        "video_p100_watched_actions"
    ],
    "parse" => function ($data) {
        $spend = floatval(str_replace(',', '', $data->{'spend'}));
    
        $collection = 'video_p100_watched_actions';
        $type = 'video_view';
    
        $actionValue = null;
    
        if (empty($data->{$collection})) return NULL;
    
        foreach ($data->{$collection} as $action) {
            if ($action['action_type'] === $type) {
                $actionValue = (float)str_replace(',', '', $action['value']);
                break;
            }
        }
    
        return !$actionValue ? 0 : $spend / $actionValue;
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'spend';
        $divisorMetric = 'video_p100_watched_actions';
    
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
        "spend",
        "video_p100_watched_actions"
    ]
];
