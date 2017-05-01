<?php
return [
    "id" => "year",
    "property" => "date_start",
    "type" => "string",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_filter" => TRUE,
    "property_name" => "year",
    "parse" => function ($data) {
      return isset($data->{'date_start'})
        ? date('Y', strtotime($data->{'date_start'}))
        : null;
    }
];
