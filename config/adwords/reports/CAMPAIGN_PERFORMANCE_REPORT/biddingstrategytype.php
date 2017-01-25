<?php
return [
    "id" => "biddingstrategytype",
    "property" => "BiddingStrategyType",
    "is_filter" => TRUE,
    "type" => "biddingstrategytype",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "values" => [
        "BUDGET_OPTIMIZER" => "auto",
        "CONVERSION_OPTIMIZER" => "max/target cpa",
        "MANUAL_CPC" => "cpc",
        "MANUAL_CPV" => "cpv",
        "MANUAL_CPM" => "cpm",
        "PAGE_ONE_PROMOTED" => "Target search page location",
        "TARGET_SPEND" => "Maximize clicks",
        "ENHANCED_CPC" => "Enhanced CPC",
        "TARGET_CPA" => "Target CPA",
        "TARGET_ROAS" => "Target ROAS",
        "TARGET_OUTRANK_SHARE" => "Target Outranking Share",
        "NONE" => "None",
        "UNKNOWN" => "unknown"
    ]
];
