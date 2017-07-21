<?php

namespace Tetris\Numbers;

use Tetris\Numbers\Report\Query\Query;

return [
    'platform' => [
        "id" => "platform",
        "property" => NULL,
        "is_filter" => FALSE,
        "type" => "string",
        "is_metric" => FALSE,
        "is_dimension" => TRUE,
        "is_percentage" => FALSE,
        'parse' => function ($data, Query $query): string {
            return ucfirst($query->platform);
        },
        'names' => [
            'en' => 'Platform',
            'pt-BR' => 'Plataforma'
        ]
    ]
];
