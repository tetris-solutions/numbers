<?php
return [
    "id" => "device",
    "property" => "Device",
    "is_filter" => TRUE,
    "type" => "devicetype",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "values" => [
        "UNKNOWN" => "Other",
        "DESKTOP" => "Computers",
        "HIGH_END_MOBILE" => "Mobile devices with full browsers",
        "TABLET" => "Tablets with full browsers"
    ],
    "incompatible" => [
        "averagefrequency",
        "averagepageviews",
        "averagetimeonsite",
        "bouncerate",
        "clickassistedconversionvalue",
        "clickassistedconversions",
        "clickassistedconversionsoverlastclickconversions",
        "impressionassistedconversionvalue",
        "impressionassistedconversions",
        "impressionassistedconversionsoverlastclickconversions",
        "impressionreach",
        "numofflineimpressions",
        "numofflineinteractions",
        "offlineinteractionrate",
        "percentnewvisitors",
        "relativectr"
    ]
];
