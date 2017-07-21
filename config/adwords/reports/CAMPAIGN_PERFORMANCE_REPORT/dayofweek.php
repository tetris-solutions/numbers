<?php
return [
    "is_filter" => TRUE,
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "values" => [
        "MONDAY" => "Monday",
        "TUESDAY" => "Tuesday",
        "WEDNESDAY" => "Wednesday",
        "THURSDAY" => "Thursday",
        "FRIDAY" => "Friday",
        "SATURDAY" => "Saturday",
        "SUNDAY" => "Sunday"
    ],
    "incompatible" => [
        "averagefrequency",
        "impressionreach"
    ],
    "id" => "dayofweek",
    "property" => "DayOfWeek",
    "type" => "dayofweek"
];
