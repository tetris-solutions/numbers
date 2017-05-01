<?php
return [
    "id" => "month",
    "property" => "date_start",
    "type" => "string",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_filter" => TRUE,
    "property_name" => "month",
    "parse" => function ($data) {
        return date('Y-m', strtotime($data->{'date_start'})) . '-01';
    }
];
