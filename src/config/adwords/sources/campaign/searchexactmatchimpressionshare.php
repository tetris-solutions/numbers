<?php
return [
    "metric" => "searchexactmatchimpressionshare",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "SearchExactMatchImpressionShare"
    ],
    "parse" => function ($data) {
      return $data->SearchExactMatchImpressionShare;
    }
];
