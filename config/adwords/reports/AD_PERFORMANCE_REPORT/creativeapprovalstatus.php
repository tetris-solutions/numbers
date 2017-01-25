<?php
return [
    "id" => "creativeapprovalstatus",
    "property" => "CreativeApprovalStatus",
    "is_filter" => TRUE,
    "type" => "approvalstatus",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "values" => [
        "APPROVED" => "approved",
        "FAMILY_SAFE" => "approved",
        "NON_FAMILY_SAFE" => "approved (non family)",
        "PORN" => "approved (adult)",
        "UNCHECKED" => "pending review",
        "DISAPPROVED" => "disapproved"
    ]
];
