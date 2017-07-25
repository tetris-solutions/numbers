<?php
return [
    "is_filter" => TRUE,
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "property_name" => "year",
    "id" => "year",
    "property" => "date_start",
    "type" => "string",
    "parse" => function ($data) {
        return date('Y', strtotime($data->{'date_start'}));
    }
];
