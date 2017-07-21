<?php
return [
    "is_filter" => TRUE,
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "id" => "creativefinalmobileurls",
    "property" => "CreativeFinalMobileUrls",
    "type" => "list",
    "parse" => function ($data) {
        return json_decode($data->{'CreativeFinalMobileUrls'});
    }
];
