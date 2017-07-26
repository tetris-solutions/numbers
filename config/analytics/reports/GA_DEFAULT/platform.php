<?php
return [
    "is_filter" => FALSE,
    "is_metric" => FALSE,
    "is_dimension" => TRUE,
    "is_percentage" => FALSE,
    "id" => "platform",
    "type" => "string",
    "names" => [
        "en" => "Platform",
        "pt-BR" => "Plataforma"
    ],
    "parse" => function () {
        return 'analytics';
    }
];
