<?php
return [
    "id" => "hourofday",
    "property" => "HourOfDay",
    "is_filter" => TRUE,
    "type" => "integer",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "incompatible" => [
        "allconversionrate",
        "allconversionvalue",
        "allconversions",
        "averagepageviews",
        "averagetimeonsite",
        "bouncerate",
        "clickassistedconversionvalue",
        "clickassistedconversions",
        "clickassistedconversionsoverlastclickconversions",
        "costperallconversion",
        "crossdeviceconversions",
        "impressionassistedconversionvalue",
        "impressionassistedconversions",
        "impressionassistedconversionsoverlastclickconversions",
        "percentnewvisitors",
        "relativectr",
        "slot",
        "valueperallconversion"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'HourOfDay'}));
    }
];
