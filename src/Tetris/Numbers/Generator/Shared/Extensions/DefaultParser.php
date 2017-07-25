<?php

namespace Tetris\Numbers\Generator\Shared\Extensions;

use Tetris\Numbers\Base\Field;
use Tetris\Numbers\Base\Parser\ComplexValueParser;
use Tetris\Numbers\Base\Parser\FloatParser;
use Tetris\Numbers\Base\Parser\IntegerParser;
use Tetris\Numbers\Base\Parser\JSONParser;
use Tetris\Numbers\Base\Parser\PercentParser;
use Tetris\Numbers\Base\Parser\RawParser;
use Tetris\Numbers\Generator\Shared\Extension;
use Tetris\Numbers\Generator\Shared\ExtensionApply;

class DefaultParser implements Extension
{
    use ExtensionApply;

    function __construct()
    {
        $parsers = [
            'list' => JSONParser::class,
            'percentage' => PercentParser::class,
            'currency' => FloatParser::class,
            'decimal' => FloatParser::class,
            'integer' => IntegerParser::class,
            'raw' => RawParser::class,
            'special' => ComplexValueParser::class
        ];

        foreach ($parsers as $type => $class) {
            $this->map[$type] = [
                'traits' => [
                    'parser' => $class
                ]
            ];
        }
    }

    function getParser(string $type, string $id): array
    {
        return $this->map[$type] ?? $this->map['raw'];
    }

    function patch(Field $source): array
    {
        return $this->getParser($source->type, $source->id);
    }
}
