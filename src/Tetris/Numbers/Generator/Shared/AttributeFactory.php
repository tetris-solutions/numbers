<?php

namespace Tetris\Numbers\Generator\Shared;


use Tetris\Numbers\Base\Attribute;
use Tetris\Numbers\Generator\Shared\Extensions\DefaultParser;

abstract class AttributeFactory extends FieldFactory
{
    protected static $parentClass = Attribute::class;
    /**
     * @var array
     */
    protected $translators;
    /**
     * @var DefaultParser
     */
    protected $parser;

    protected abstract function getId(string $entity, string $originalPropertyName): string;

    protected abstract function normalizeProperty(string $propertyName): string;

    protected abstract function normalizeType(string $attributeId, string $originalType, $isSpecialValue, $isPercentage): string;

    protected abstract function isMetric(TransientAttribute $attribute, $behavior): bool;

    protected abstract function isParsable(TransientAttribute $attribute): bool;

    function create(
        string $reportName,
        string $entity,
        string $originalProperty,
        string $behavior,
        string $originalType,
        bool $filterable,
        bool $percentage,
        bool $specialValue,
        $predicateValues,
        $incompatibleFields
    ): TransientAttribute
    {
        $attribute = new TransientAttribute();

        $attribute->parent = self::$parentClass;
        $attribute->platform = $this->platform;
        $attribute->path = "{$attribute->platform}/Attributes/{$reportName}";
        $attribute->id = $this->getId($entity, $originalProperty);
        $attribute->property = $this->normalizeProperty($originalProperty);
        $attribute->raw_property = $originalProperty;
        $attribute->is_filter = $filterable;
        $attribute->type = $this->normalizeType($attribute->id, $originalType, $specialValue, $percentage);
        $attribute->is_metric = $this->isMetric($attribute, $behavior);
        $attribute->is_dimension = !$attribute->is_metric;
        $attribute->is_percentage = $percentage;
        $attribute->values = $predicateValues;
        $attribute->incompatible = $incompatibleFields;

        if ($this->isParsable($attribute)) {
            $attribute->parse = $this->legacyParser->getFactory(
                $attribute->type,
                $attribute->property
            );
            $attribute->traits['parser'] = $this->parser->getParser($attribute->type);
        } else {
            $attribute->traits['parser'] = $this->parser->getParser('raw');
        }

        return $attribute;
    }
}