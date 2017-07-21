<?php
return [
    "is_filter" => TRUE,
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "id" => "creativefinalappurls",
    "property" => "CreativeFinalAppUrls",
    "type" => "list",
    "parse" => function ($data) {
        return json_decode($data->{'CreativeFinalAppUrls'});
    }
];
