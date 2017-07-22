<?php
return [
    "metric" => "searchclickshare",
    "entity" => "Partition",
    "fields" => [
        "SearchClickShare"
    ],
    "report" => "PRODUCT_PARTITION_REPORT",
    "platform" => "adwords",
    "parse" => function ($data) {
        $parseValue = function ($str) {
            if (!is_string($str)) {
                return null;
            }
    
            $multiplier = 1;
    
            if (strpos($str, '%') !== FALSE) {
                $multiplier = 0.01;
            }
    
            $isSpecial = strpos($str, '>') !== FALSE || strpos($str, '<') !== FALSE;
    
            $clean = preg_replace("/[^0-9.-]/", "", $str);
    
            if (!is_numeric($clean)) {
                return ['value' => null, 'raw' => $str];
            }
    
            $estimate = floatval($clean) * $multiplier;
    
            return $isSpecial
                ? ['value' => $estimate, 'raw' => $str]
                : $estimate;
        };
    
        return $parseValue($data->{'SearchClickShare'});
    }
];
