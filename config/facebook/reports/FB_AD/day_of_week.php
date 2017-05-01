<?php
return [
    "id" => "day_of_week",
    "property" => "date_start",
    "type" => "string",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_filter" => TRUE,
    "property_name" => "day_of_week",
    "parse" => function ($data) {
        return date('l', strtotime($data->{'date_start'}));
    }
];
