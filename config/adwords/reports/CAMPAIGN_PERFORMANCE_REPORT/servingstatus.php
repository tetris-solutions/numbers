<?php
return [
    "id" => "servingstatus",
    "property" => "ServingStatus",
    "is_filter" => TRUE,
    "type" => "servingstatus",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "values" => [
        "SERVING" => "eligible",
        "NONE" => "none",
        "ENDED" => "ended",
        "PENDING" => "pending",
        "SUSPENDED" => "suspended"
    ]
];
