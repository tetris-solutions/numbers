<?php

namespace Tetris\Numbers\Generator\Facebook;

use Tetris\Numbers\Base\Attribute;
use Tetris\Numbers\Generator\Shared\Extensions\DefaultParser;
use Tetris\Numbers\Generator\Shared\AttributeTranslator;
use Tetris\Numbers\Generator\Shared\TransientAttribute;
use Tetris\Numbers\Generator\Shared\LegacyTypeParser;

class AttributeFactory
{

    /**
     * @var array
     */
    private $translators;
    /**
     * @var DefaultParser
     */
    private $parser;

    /**
     * @var \Tetris\Numbers\Generator\Shared\LegacyTypeParser
     */
    private $legacyParser;

    function __construct()
    {
        $this->legacyParser = new LegacyTypeParser();
        $this->parser = new DefaultParser();
        $this->translators = [

        ];

        $adGroupLevel = [
            'Product',
            'Search',
            'Location',
            'Category',
            'Query'
        ];

        foreach ($adGroupLevel as $entity) {
            $this->translators[] = new AttributeTranslator($entity, [
                'AdGroupId',
                'AdGroupName',
                'AdGroupStatus'
            ], 'AdGroup');
        }


    }

    private function getId(string $entity, string $attributeName): string
    {
        /**
         * @var \Tetris\Numbers\Generator\Shared\AttributeTranslator $translator
         */
        foreach ($this->translators as $translator) {
            $translation = $translator->translate($entity, $attributeName);

            if ($translation) {
                return strtolower($translation);
            }
        }

        return strtolower($attributeName);
    }

    private function normalizeProperty(string $property): string
    {
        switch ($property) {
            case 'AverageQualityScore':
                return 'QualityScore';
            default:
                return $property;
        }
    }

    private function normalizeAttributeType(string $id, string $type, $specialValue, $percentage): string
    {
        $overrideType = [
            'averagecpv' => 'currency',
            'averagecpe' => 'currency',
            'averagecpm' => 'currency',
            'averagequalityscore' => 'decimal'
        ];

        $default = strtolower($type);

        if ($id === 'id') {
            return $default;
        }

        if (isset($overrideType[$id])) {
            return $overrideType[$id];
        }

        if ($specialValue) {
            return 'special';
        }

        if ($percentage) {
            return 'percentage';
        }

        switch ($type) {
            case 'Money':
            case 'Bid':
                return 'currency';
            case 'Long':
                return 'integer';
            case 'Double':
                return 'decimal';
        }

        return $default;
    }

    private function isMetric(string $id, string $behavior): bool
    {
        $actuallyIsAMetric = [
            'estimatedaddclicksatfirstpositioncpc',
            'estimatedaddcostatfirstpositioncpc',
            'cpmbid',
            'topofpagecpc',
            'firstpagecpc',
            'firstpositioncpc',
            'averagequalityscore'
        ];

        return (
            strtolower($behavior) === 'metric' ||
            in_array($id, $actuallyIsAMetric)
        );
    }

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

        $attribute->parent = Attribute::class;
        $attribute->platform = 'Facebook';
        $attribute->path = "Facebook/Attributes/{$reportName}";
        $attribute->id = $this->getId($entity, $originalProperty);
        $attribute->property = $this->normalizeProperty($originalProperty);
        $attribute->raw_property = $originalProperty;
        $attribute->is_filter = $filterable;
        $attribute->type = $this->normalizeAttributeType($attribute->id, $originalType, $specialValue, $percentage);
        $attribute->is_metric = $this->isMetric($attribute->id, $behavior);
        $attribute->is_dimension = !$attribute->is_metric;
        $attribute->is_percentage = $percentage;
        $attribute->values = $predicateValues;
        $attribute->incompatible = $incompatibleFields;

        if (
            $attribute->is_dimension && (
                $attribute->type === 'integer' ||
                $attribute->type === 'list'
            )
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
