<?php

namespace Tetris\Numbers\Generator\Facebook\Extensions;

use Tetris\Numbers\Base\Parser\FacebookMonthParser;
use Tetris\Numbers\Generator\Shared\Extensions\DefaultParser;

class FacebookParser extends DefaultParser
{
    private $dateParts = [];

    function __construct()
    {
        parent::__construct();

        $parts = [
            'month' => FacebookMonthParser::class
        ];

        foreach ($parts as $name => $class) {
            $this->dateParts[$name] = [
                'property' => 'date_start',
                'property_name' => $name,
                'traits' => [
                    'parser' => $class
                ]
            ];
        }
    }

    function getParser(string $type, string $id): array
    {
        return $this->dateParts[$id] ?? parent::getParser($type, $id);
    }
}