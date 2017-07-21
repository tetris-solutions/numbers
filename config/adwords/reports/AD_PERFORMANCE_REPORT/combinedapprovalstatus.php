<?php
return [
    "is_filter" => TRUE,
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "values" => [
        "UNKNOWN" => "POLICY_APPROVAL_STATUS_UNKNOWN",
        "APPROVED" => "Approved",
        "APPROVED_LIMITED" => "Approved (limited)",
        "ELIGIBLE" => "Eligible",
        "UNDER_REVIEW" => "Under review",
        "DISAPPROVED" => "Disapproved",
        "SITE_SUSPENDED" => "Site suspended"
    ],
    "id" => "combinedapprovalstatus",
    "property" => "CombinedApprovalStatus",
    "type" => "policyapprovalstatus"
];
