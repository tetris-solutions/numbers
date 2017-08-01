<?php

namespace Tetris\Numbers\Generator\Vtex;

use Tetris\Numbers\Generator\Vtex\Extensions\VtexParser;
use Tetris\Numbers\Generator\Shared\AttributeFactory;
use Tetris\Numbers\Generator\Shared\AttributeTranslator;
use Tetris\Numbers\Generator\Shared\TransientAttribute;

class VtexAttributeFactory extends AttributeFactory
{
    protected $platform = 'Vtex';

    function __construct()
    {
        $this->parser = new VtexParser();
        $this->translators = [
            new AttributeTranslator('Order', [
                'orderId' => 'id',
                'lastChange' => 'date'
            ])
        ];
    }

    protected function isMetric(TransientAttribute $attribute, $behaviorOrGroup): bool
    {
        return $behaviorOrGroup === 'METRIC';
    }

    protected function normalizeType(TransientAttribute $attribute, string $originalType, $isSpecialValue, $isPercentage): string 
    {
        return $originalType;
    }

    protected function getId(string $entity, string $attributeName): string
    {
        return parent::getId($entity, $attributeName);
    }

    protected function isParsable(TransientAttribute $attribute): bool
    {
        return isset(VtexParser::dateParsers[$attribute->id]);
    }
}
