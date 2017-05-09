<?php
return [
    "id" => "labels",
    "property" => "Labels",
    "is_filter" => TRUE,
    "type" => "list",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "parse" => function ($data) {
        return json_decode($data->{'Labels'});
    }
];
