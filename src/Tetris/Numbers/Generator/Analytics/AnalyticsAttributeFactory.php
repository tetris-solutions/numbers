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
        parent::__construct();

        $this->parser = new AnalyticsParser();
        $this->translators = [
            new AttributeTranslator('Campaign', [
                'campaign' => 'id',
                'month' => 'monthofyear'
            ])
        ];
    }

    protected function isMetric(TransientAttribute $attribute, $behavior): bool
    {
        $notId = substr($attribute->property, -3) !== '_id';

        return $notId && (
                $attribute->type === 'float' ||
                $attribute->type === 'percentage' ||
                $attribute->type === 'numeric string'
            );
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
