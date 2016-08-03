<?php
return [
    "metric" => "interactiontypes",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "InteractionTypes"
    ],
    "parse" => function ($data): int {
      return (int)$data->InteractionTypes;
    }
];
