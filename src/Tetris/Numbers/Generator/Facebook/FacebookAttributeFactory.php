<?php

namespace Tetris\Numbers\Generator\Facebook;

use Tetris\Numbers\Generator\Shared\AttributeFactory;
use Tetris\Numbers\Generator\Shared\Extensions\DefaultParser;
use Tetris\Numbers\Generator\Shared\AttributeTranslator;
use Tetris\Numbers\Generator\Shared\TransientAttribute;

class FacebookAttributeFactory extends AttributeFactory
{

    protected $platform = 'Facebook';

    function __construct()
    {
        parent::__construct();

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

    protected function isMetric(TransientAttribute $attribute, $behavior): bool
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
            in_array($attribute->id, $actuallyIsAMetric)
        );
    }

    protected function getId(string $entity, string $originalPropertyName): string
    {
        // TODO: Implement getId() method.
    }

    protected function normalizeProperty(string $propertyName): string
    {
        // TODO: Implement normalizeProperty() method.
    }

    protected function normalizeType(string $attributeId, string $originalType, $isSpecialValue, $isPercentage): string
    {
        // TODO: Implement normalizeType() method.
    }

    protected function isParsable(TransientAttribute $attribute): bool
    {
        // TODO: Implement legacyDimensionIsParsable() method.
    }
}
