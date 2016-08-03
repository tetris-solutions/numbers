<?php
return [
    "metric" => "crossdeviceconversions",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "CrossDeviceConversions"
    ],
    "parse" => function ($data): int {
      return (int)$data->CrossDeviceConversions;
    }
];
