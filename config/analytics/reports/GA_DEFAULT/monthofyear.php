<?php
return [
    "id" => "monthofyear",
    "property" => "ga:month",
    "type" => "string",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_filter" => FALSE,
    "parse" => function ($data) {
        return date('F', strtotime('2000-' . $data->{'ga:month'} . '-01'));
    }
];
