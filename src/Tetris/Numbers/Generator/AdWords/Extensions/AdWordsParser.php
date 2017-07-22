<?php

namespace Tetris\Numbers\Generator\AdWords\Extensions;

use Tetris\Numbers\Base\Parser\ComplexValueParser;
use Tetris\Numbers\Base\Parser\FloatParser;
use Tetris\Numbers\Base\Parser\IntegerParser;
use Tetris\Numbers\Base\Parser\JSONParser;
use Tetris\Numbers\Base\Parser\PercentParser;
use Tetris\Numbers\Base\Parser\RawParser;
use Tetris\Numbers\Generator\Extension;
use Tetris\Numbers\Generator\ExtensionApply;
use Tetris\Numbers\Generator\TransientSource;

class AdWordsParser implements Extension
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

    function patch(TransientSource $source): TransientSource
    {
        $source->traits['parser'] = $this->map[$source->type] ?? $this->map['raw'];

        return $source;
    }
}
