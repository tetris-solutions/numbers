<?php
return [
    "is_filter" => TRUE,
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
    "id" => "hourofday",
    "property" => "HourOfDay",
    "type" => "integer",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'HourOfDay'}));
    }
];
