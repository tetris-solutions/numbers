<?php
return [
    "id" => "adgroupaddisapprovalreasons",
    "property" => "AdGroupAdDisapprovalReasons",
    "is_filter" => TRUE,
    "type" => "list",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "parse" => function ($data) {
        return json_decode($data->{'AdGroupAdDisapprovalReasons'});
    }
];
