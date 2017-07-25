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

    protected function getId(string $entity, string $attributeName): string
    {
        /**
         * @var AttributeTranslator $translator
         */
        foreach ($this->translators as $translator) {
            $translation = $translator->translate($entity, $attributeName);

            if ($translation) {
                return strtolower($translation);
            }
        }

        return strtolower($attributeName);
    }

    protected function normalizeAttributeId(string $id): string
    {
        return $id;
    }

    protected function normalizeProperty(string $propertyName): string
    {
        return $propertyName;
    }

    protected abstract function normalizeType(TransientAttribute $attribute, string $originalType, $isSpecialValue, $isPercentage): string;

    protected abstract function isMetric(TransientAttribute $attribute, $behavior): bool;

    protected abstract function isParsable(TransientAttribute $attribute): bool;

    function create(
        string $reportName,
        string $entity,
        string $originalProperty,
        string $originalType,
        bool $isFilterable,
        bool $isPercentage,
        bool $isSpecialValue,
        $description = null,
        $behavior = null,
        $predicateValues = null,
        $incompatibleFields = null
    ): TransientAttribute
    {
        $attribute = new TransientAttribute();
        $id = $this->normalizeAttributeId($originalProperty);

        $attribute->description = $description;
        $attribute->parent = self::$parentClass;
        $attribute->platform = $this->platform;
        $attribute->path = "{$attribute->platform}/Attributes/{$reportName}";
        $attribute->id = $this->getId($entity, $id);
        $attribute->property = $this->normalizeProperty($id);
        $attribute->raw_property = $originalProperty;
        $attribute->is_filter = $isFilterable;
        $attribute->type = $originalType;
        $attribute->is_metric = $this->isMetric($attribute, $behavior);

        // normalize
        $attribute->type = $this->normalizeType($attribute, $originalType, $isSpecialValue, $isPercentage);

        $attribute->is_dimension = !$attribute->is_metric;
        $attribute->is_percentage = $isPercentage;
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