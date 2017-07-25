<?php
return [
    "is_filter" => TRUE,
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "id" => "day_of_week",
    "property" => "date_start",
    "type" => "string",
    "parse" => function ($data) {
        return date('l', strtotime($data->{'date_start'}));
    }
];
