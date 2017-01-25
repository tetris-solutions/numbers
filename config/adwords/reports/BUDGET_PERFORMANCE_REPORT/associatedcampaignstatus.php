<?php
return [
    "id" => "associatedcampaignstatus",
    "property" => "AssociatedCampaignStatus",
    "is_filter" => TRUE,
    "type" => "campaignstatus",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "values" => [
        "ENABLED" => "enabled",
        "PAUSED" => "paused",
        "REMOVED" => "removed",
        "UNKNOWN" => "unknown"
    ]
];
