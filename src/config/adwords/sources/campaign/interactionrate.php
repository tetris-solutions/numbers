<?php
return [
    "metric" => "interactionrate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "InteractionRate"
    ],
    "parse" => function ($data): float {
      return floatval(str_replace('%', '', $data->InteractionRate)) / 100;
    }
];
