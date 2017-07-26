<?php

namespace Tetris\Numbers\Generator\Analytics\Extensions;

use Tetris\Numbers\Base\Parser\AnalyticsDateParser;
use Tetris\Numbers\Base\Parser\AnalyticsMonthOfYearParser;
use Tetris\Numbers\Base\Parser\AnalyticsWeekParser;
use Tetris\Numbers\Base\Parser\AnalyticsYearMonthParser;
use Tetris\Numbers\Generator\Shared\Extensions\DefaultParser;

class AnalyticsParser extends DefaultParser
{
    private $dateParts = [];

    const dateParsers = [
        'date' => AnalyticsDateParser::class,
        'yearmonth' => AnalyticsYearMonthParser::class,
        'isoyearisoweek' => AnalyticsWeekParser::class,
        'monthofyear' => AnalyticsMonthOfYearParser::class
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
