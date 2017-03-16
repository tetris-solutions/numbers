<?php
return [
    "id" => "advertiserexperimentsegmentationbin",
    "property" => "AdvertiserExperimentSegmentationBin",
    "is_filter" => TRUE,
    "type" => "advertiserexperimentsegmentationbin",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "values" => [
        "OUTSIDE_OF_EXPERIMENT" => "outside experiment",
        "CONTROL" => "control",
        "EXPERIMENT" => "experiment"
    ],
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
        "clicktype",
        "contentimpressionshare",
        "contentranklostimpressionshare",
        "costperallconversion",
        "crossdeviceconversions",
        "impressionassistedconversionvalue",
        "impressionassistedconversions",
        "impressionassistedconversionsoverlastclickconversions",
        "numofflineimpressions",
        "numofflineinteractions",
        "offlineinteractionrate",
        "percentnewvisitors",
        "relativectr",
        "searchexactmatchimpressionshare",
        "searchimpressionshare",
        "searchranklostimpressionshare",
        "valueperallconversion"
    ]
];
