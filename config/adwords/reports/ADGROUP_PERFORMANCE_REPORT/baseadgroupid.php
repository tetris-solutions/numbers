<?php
return [
    "is_filter" => TRUE,
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "id" => "baseadgroupid",
    "property" => "BaseAdGroupId",
    "type" => "integer",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'BaseAdGroupId'}));
    }
];
