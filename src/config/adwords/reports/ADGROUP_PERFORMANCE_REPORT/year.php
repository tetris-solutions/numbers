<?php
return [
    "id" => "year",
    "property" => "Year",
    "is_filter" => TRUE,
    "type" => "integer",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "parse" => function ($data): int {
        return (int)$data->year;
    }
];
