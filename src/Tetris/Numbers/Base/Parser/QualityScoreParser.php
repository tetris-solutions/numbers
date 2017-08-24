<?php

namespace Tetris\Numbers\Base\Parser;

use Tetris\Numbers\Base\ComplexValue;
use Tetris\Numbers\Report\Query\Query;

trait QualityScoreParser
{
    use ComplexValueParser;

    /**
     * @var array
     */
    public $auxiliaryMetrics;

    function parse($source, Query $query)
    {
        $value = $this->getValue($source);

        return is_numeric($value)
            ? (int)$this->getNumericValue($source)
            : new ComplexValue('---', 'Ø');
    }

    static function parserSpec(): array
    {
        return [
            'traits' => [
                'parser' => self::class
            ]
        ];
    }
}
