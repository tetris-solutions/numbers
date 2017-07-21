<?php
return [
    "is_filter" => TRUE,
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "id" => "languagecriteriaid",
    "property" => "LanguageCriteriaId",
    "type" => "integer",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'LanguageCriteriaId'}));
    }
];
