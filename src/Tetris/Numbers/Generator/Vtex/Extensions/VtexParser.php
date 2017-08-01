<?php

namespace Tetris\Numbers\Generator\Vtex\Extensions;

use Tetris\Numbers\Base\Parser\VtexDateParser;
use Tetris\Numbers\Base\Parser\VtexMonthOfYearParser;
use Tetris\Numbers\Base\Parser\VtexWeekParser;
use Tetris\Numbers\Base\Parser\VtexYearMonthParser;
use Tetris\Numbers\Generator\Shared\Extensions\DefaultParser;

class VtexParser extends DefaultParser
{
    private $dateParts = [];

    const dateParsers = [
        'date' => VtexDateParser::class
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
