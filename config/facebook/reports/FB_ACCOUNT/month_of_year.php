<?php
return [
    "id" => "month_of_year",
    "property" => "date_start",
    "type" => "string",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_filter" => TRUE,
    "property_name" => "month_of_year",
    "parse" => function ($data) {
        return date('F', strtotime($data->{'date_start'}));
    }
];
