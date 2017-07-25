<?php
return [
    "is_filter" => TRUE,
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "id" => "quarter",
    "property" => "date_start",
    "type" => "string",
    "parse" => function ($data) {
        $time = strtotime($data->{'date_start'});
        $year = date('Y', $time);
        $month = date('n', $time);
    
        switch ((int)$month) {
          case 1:
          case 2:
          case 3:
            return "{$year}-01-01";
          case 4:
          case 5:
          case 6:
            return "{$year}-04-01";
          case 7:
          case 8:
          case 9:
            return "{$year}-07-01";
          case 10:
          case 11:
          case 12:
            return "{$year}-10-01";
        }
    }
];
