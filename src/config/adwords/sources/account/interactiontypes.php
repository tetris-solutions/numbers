<?php
return [
    "metric" => "interactiontypes",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "InteractionTypes"
    ],
    "parse" => function ($data): int {
      return (int)$data->InteractionTypes;
    }
];
