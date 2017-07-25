<?php

namespace Tetris\Numbers\Generator\Facebook\Extensions;

use Tetris\Numbers\Base\Parser\FacebookDayOfWeekParser;
use Tetris\Numbers\Base\Parser\FacebookMonthOfYearParser;
use Tetris\Numbers\Base\Parser\FacebookMonthParser;
use Tetris\Numbers\Base\Parser\FacebookQuarterParser;
use Tetris\Numbers\Base\Parser\FacebookWeekParser;
use Tetris\Numbers\Base\Parser\FacebookYearParser;
use Tetris\Numbers\Generator\Shared\Extensions\DefaultParser;

class FacebookParser extends DefaultParser
{
    public $dateParts = [];
    const dateParsers = [
        'month' => FacebookMonthParser::class,
        'year' => FacebookYearParser::class,
        'week' => FacebookWeekParser::class,
        'day_of_week' => FacebookDayOfWeekParser::class,
        'month_of_year' => FacebookMonthOfYearParser::class,
        'quarter' => FacebookQuarterParser::class
    ];

    function __construct()
    {
        parent::__construct();

        foreach (self::dateParsers as $name => $class) {
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
