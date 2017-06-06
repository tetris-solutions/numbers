<?php
return [
    "id" => "adnetworktype2",
    "property" => "AdNetworkType2",
    "is_filter" => TRUE,
    "type" => "adnetworktype2",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "values" => [
        "UNKNOWN" => "unknown",
        "SEARCH" => "Google search",
        "SEARCH_PARTNERS" => "Search partners",
        "CONTENT" => "Display Network",
        "YOUTUBE_SEARCH" => "YouTube Search",
        "YOUTUBE_WATCH" => "YouTube Videos"
    ],
    "incompatible" => [
        "historicalcreativequalityscore",
        "historicallandingpagequalityscore",
        "historicalqualityscore",
        "historicalsearchpredictedctr"
    ]
];
