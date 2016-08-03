<?php
return [
    "metric" => "searchranklostimpressionshare",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "SearchRankLostImpressionShare"
    ],
    "parse" => function ($data) {
      return $data->SearchRankLostImpressionShare;
    }
];
