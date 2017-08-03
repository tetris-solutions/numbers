<?php

namespace Tetris\Numbers\Generator\Vtex\Extensions;

use Tetris\Numbers\Base\Parser\DateParser;
use Tetris\Numbers\Generator\Shared\Extensions\DefaultParser;

class VtexParser extends DefaultParser
{
    private $dateParts = [];

    const dateParsers = [
        'date' => DateParser::class
    ];

    function __construct()
    {
        parent::__construct();

        foreach (self::dateParsers as $name => $class) {
            $this->dateParts[$name] = [
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
