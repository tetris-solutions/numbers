<?php
return [
    "metric" => "valueperallconversion",
    "entity" => "Partition",
    "platform" => "adwords",
    "report" => "PRODUCT_PARTITION_REPORT",
    "fields" => [
        "ValuePerAllConversion"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ValuePerAllConversion'}));
    },
    "inferred_from" => [
        "allconversionvalue",
        "allconversions"
    ],
    "sum" => function (array $rows) {
        $dividendMetric = 'allconversionvalue';
        $divisorMetric = 'allconversions';
    
        $sumDividend = 0;
        $sumDivisor = 0;
    
        foreach ($rows as $row) {
            $sumDividend += $row->{$dividendMetric};
            $sumDivisor += $row->{$divisorMetric};
        }
    
        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    }
];
