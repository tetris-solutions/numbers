<?php
return [
    "id" => "querymatchtypewithvariant",
    "property" => "QueryMatchTypeWithVariant",
    "is_filter" => TRUE,
    "type" => "querymatchtypewithvariant",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "values" => [
        "AUTO" => "auto",
        "BROAD" => "broad",
        "EXACT" => "exact",
        "EXPANDED" => "broad",
        "PHRASE" => "phrase",
        "NEAR_EXACT" => "exact (close variant)",
        "NEAR_PHRASE" => "phrase (close variant)"
    ]
];
