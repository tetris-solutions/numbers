<?php
return [
    "metric" => "crossdeviceconversions",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "CrossDeviceConversions"
    ],
    "parse" => function ($data): int {
      return (int)$data->CrossDeviceConversions;
    }
];
