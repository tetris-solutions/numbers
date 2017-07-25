<?php
return [
    "is_filter" => TRUE,
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "property_name" => "month_of_year",
    "id" => "month_of_year",
    "property" => "date_start",
    "type" => "string",
    "parse" => function ($data) {
        return date('F', strtotime($data->{'date_start'}));
    }
];
