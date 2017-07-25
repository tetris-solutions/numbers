<?php

namespace Tetris\Numbers\Generator\Shared;


use Tetris\Numbers\Generator\Shared\Extensions\DefaultParser;

abstract class AttributeFactory
{
    /**
     * @var string
     */
    protected $platform;
    /**
     * @var string
     */
    protected $parentClass;

    /**
     * @var array
     */
    protected $translators;
    /**
     * @var DefaultParser
     */
    protected $parser;

    /**
     * @var LegacyTypeParser
     */
    protected $legacyParser;

    protected abstract function getId(string $entity, string $originalPropertyName): string;

    protected abstract function normalizeProperty(string $propertyName): string;

    protected abstract function normalizeType(string $attributeId, string $originalType, $isSpecialValue, $isPercentage): string;

    protected abstract function isMetric(TransientAttribute $attribute, $behavior): bool;

    protected abstract function legacyDimensionIsParsable(TransientAttribute $attribute): bool;

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

        $attribute->parent = $this->parentClass;
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

        if (
        $this->legacyDimensionIsParsable($attribute)
        ) {
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