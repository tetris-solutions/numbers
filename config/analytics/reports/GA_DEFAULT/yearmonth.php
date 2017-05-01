<?php
return [
    "id" => "yearmonth",
    "property" => "ga:yearMonth",
    "type" => "string",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_filter" => FALSE,
    "parse" => function ($data) {
        return date('Y-m-d', strtotime($data->{'ga:yearMonth'} . '01'));
    }
];
