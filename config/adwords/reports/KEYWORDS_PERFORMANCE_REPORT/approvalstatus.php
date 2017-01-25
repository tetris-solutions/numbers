<?php
return [
    "id" => "approvalstatus",
    "property" => "ApprovalStatus",
    "is_filter" => TRUE,
    "type" => "approvalstatus",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "values" => [
        "APPROVED" => "approved",
        "PENDING_REVIEW" => "pending review",
        "UNDER_REVIEW" => "under review",
        "DISAPPROVED" => "disapproved"
    ]
];
