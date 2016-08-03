<?php
return [
    "metric" => "ctr",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "Ctr"
    ],
    "parse" => function ($data): float {
      return floatval(str_replace('%', '', $data->Ctr)) / 100;
    }
];
