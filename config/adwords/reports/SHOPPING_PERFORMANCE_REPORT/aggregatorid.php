<?php
return [
    "id" => "aggregatorid",
    "property" => "AggregatorId",
    "is_filter" => TRUE,
    "type" => "integer",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'AggregatorId'}));
    }
];
