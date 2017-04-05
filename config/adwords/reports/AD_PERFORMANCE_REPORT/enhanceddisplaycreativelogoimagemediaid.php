<?php
return [
    "id" => "enhanceddisplaycreativelogoimagemediaid",
    "property" => "EnhancedDisplayCreativeLogoImageMediaId",
    "is_filter" => TRUE,
    "type" => "integer",
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'EnhancedDisplayCreativeLogoImageMediaId'}));
    }
];
