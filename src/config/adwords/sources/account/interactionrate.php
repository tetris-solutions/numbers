<?php
return [
    "metric" => "interactionrate",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "InteractionRate"
    ],
    "parse" => function ($data): float {
      return floatval(str_replace('%', '', $data->InteractionRate)) / 100;
    }
];
