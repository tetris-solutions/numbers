<?php
return [
    "id" => "devicepreference",
    "property" => "DevicePreference",
    "is_filter" => TRUE,
    "type" => "integer",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->DevicePreference);
    }
];
