<?php
return [
    "is_filter" => TRUE,
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "property_name" => "month",
    "id" => "month",
    "property" => "date_start",
    "type" => "string",
    "parse" => function ($data) {
        return date('Y-m', strtotime($data->{'date_start'})) . '-01';
    }
];
