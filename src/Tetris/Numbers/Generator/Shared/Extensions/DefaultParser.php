<?php

namespace Tetris\Numbers\Generator\Shared\Extensions;

use Tetris\Numbers\Base\Parser\ComplexValueParser;
use Tetris\Numbers\Base\Parser\FloatParser;
use Tetris\Numbers\Base\Parser\IntegerParser;
use Tetris\Numbers\Base\Parser\JSONParser;
use Tetris\Numbers\Base\Parser\PercentParser;
use Tetris\Numbers\Base\Parser\RawParser;
use Tetris\Numbers\Generator\Shared\Extension;
use Tetris\Numbers\Generator\Shared\TransientMetric;
use Tetris\Numbers\Generator\Shared\ExtensionApply;

class DefaultParser implements Extension
{
    use ExtensionApply;

    public $map;

    function __construct()
    {
        $this->map = [
            'list' => JSONParser::class,
            'percentage' => PercentParser::class,
            'currency' => FloatParser::class,
            'decimal' => FloatParser::class,
            'integer' => IntegerParser::class,
            'raw' => RawParser::class,
            'special' => ComplexValueParser::class
        ];
    }

    function getParser(string $type)
    {
        return $this->map[$type] ?? null;
    }

    function patch(TransientMetric $source): TransientMetric
    {
        $source->traits['parser'] = $this->map[$source->type] ?? $this->map['raw'];

        return $source;
    }
}
