<?php
return [
    "id" => "isoyearisoweek",
    "property" => "ga:isoYearIsoWeek",
    "type" => "string",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_filter" => FALSE,
    "parse" => function ($data) {
        $date = new DateTime();
        $isoWeek = $data->{'ga:isoYearIsoWeek'};
    
        $year = (int)substr($isoWeek, 0, 4);
        $week = (int)substr($isoWeek, 4);
    
        $date->setISODate($year, $week);
    
        return $date->format('Y-m-d');
    }
];
