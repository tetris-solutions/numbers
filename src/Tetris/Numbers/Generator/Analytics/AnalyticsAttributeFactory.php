<?php

namespace Tetris\Numbers\Generator\Analytics;

use Tetris\Numbers\Generator\Analytics\Extensions\AnalyticsParser;
use Tetris\Numbers\Generator\Shared\AttributeFactory;
use Tetris\Numbers\Generator\Shared\AttributeTranslator;
use Tetris\Numbers\Generator\Shared\TransientAttribute;

class AnalyticsAttributeFactory extends AttributeFactory
{
    protected $platform = 'Analytics';

    function __construct()
    {
        $this->parser = new AnalyticsParser();
        $this->translators = [
            new AttributeTranslator('Campaign', [
                'campaign' => 'id',
                'month' => 'monthofyear'
            ])
        ];
    }

    protected function isMetric(TransientAttribute $attribute, $group): bool
    {
        return $group === 'METRIC';
    }

    protected function getId(string $entity, string $attributeName): string
    {
        $attributeName = strtolower(substr($attributeName, 3));

        return parent::getId($entity, $attributeName);
    }

    protected function normalizeType(TransientAttribute $attribute, string $originalType, $isSpecialValue, $isPercentage): string
    {
        $type = strtolower($originalType);

        switch ($type) {
            case 'float':
                return 'decimal';
            case 'percent':
                return 'percentage';
            default:
                return $type;
        }
    }

    protected function isParsable(TransientAttribute $attribute): bool
    {
        return isset(AnalyticsParser::dateParsers[$attribute->id]);
    }
}
