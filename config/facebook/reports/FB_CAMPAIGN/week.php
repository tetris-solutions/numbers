<?php
return [
    "id" => "week",
    "property" => "date_start",
    "type" => "string",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_filter" => TRUE,
    "property_name" => "week",
    "parse" => function ($data) {
        $time = strtotime($data->{'date_start'});
        $weekDay = date('N', $time) - 1;
    
        $firstMomentOfWeek = $time - (24 * 60 * 60 * $weekDay);
    
        return date('Y-m-d', $firstMomentOfWeek);
    }
];
