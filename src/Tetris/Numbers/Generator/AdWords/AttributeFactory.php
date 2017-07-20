<?php

namespace Tetris\Numbers\Generator\AdWords;

use Tetris\Numbers\Generator\AttributeTranslator;

class AttributeFactory
{

    /**
     * @var array
     */
    private $translators;
    /**
     * @var TypeParser
     */
    private $parser;

    function __construct()
    {
        $this->parser = new TypeParser();
        $this->translators = [
            new AttributeTranslator('Account', [
                'ExternalCustomerId' => 'Id',
                'AccountCurrencyCode',
                'AccountDescriptiveName' => 'Name',
                'AccountTimeZone'
            ]),

            new AttributeTranslator('Ad', [
                'AdType'
            ]),

            new AttributeTranslator('AdGroup', [
                'AdGroupDesktopBidModifier',
                'AdGroupId',
                'AdGroupMobileBidModifier',
                'AdGroupName',
                'AdGroupStatus',
                'AdGroupTabletBidModifier',
                'AdGroupType'
            ]),

            new AttributeTranslator('Budget', [
                'BudgetId',
                'BudgetName',
                'BudgetReferenceCount',
                'BudgetStatus',
                'BudgetCampaignAssociationStatus'
            ]),

            new AttributeTranslator('Campaign', [
                'CampaignDesktopBidModifier',
                'CampaignGroupId',
                'CampaignId',
                'CampaignMobileBidModifier',
                'CampaignName',
                'CampaignStatus',
                'CampaignTabletBidModifier',
                'CampaignTrialType'
            ]),

            new AttributeTranslator('Keyword', [
                'KeywordMatchType'
            ]),

            new AttributeTranslator('Placement', [
                'CampaignId',
                'CampaignName',
                'CampaignStatus'
            ], 'Campaign'),

            new AttributeTranslator('Video', [
                'VideoChannelId',
                'VideoDuration',
                'VideoId',
                'VideoTitle'
            ]),

            new AttributeTranslator('Partition', [
                'PartitionType'
            ]),

            new AttributeTranslator('Audience', [
                'UserListName' => 'Name'
            ])
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

    private function normalizeProperty(string $property): string
    {
        switch ($property) {
            case 'AverageQualityScore':
                return 'QualityScore';
            default:
                return $property;
        }
    }

    function getAdWordsAttributeType(string $id, string $type, $specialValue, $percentage): string
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

    private function isAdWordsMetric(string $id, string $behavior): bool
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
        string $entity,
        string $originalProperty,
        string $behavior,
        string $type,
        bool $filterable,
        bool $percentage,
        bool $specialValue,
        $predicateValues,
        $incompatibleFields
    ): Attribute
    {
        $attribute = new Attribute();

        $attribute->id = $this->getId($entity, $originalProperty);
        $attribute->property = $this->normalizeProperty($originalProperty);
        $attribute->raw_property = $originalProperty;
        $attribute->is_filter = $filterable;
        $attribute->type = $this->getAdWordsAttributeType($attribute->id, $type, $specialValue, $percentage);
        $attribute->is_metric = $this->isAdWordsMetric($attribute->id, $behavior);
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
            $attribute->parse = $this->parser->getFactory(
                $attribute->type,
                $attribute->property
            );
        }

        return $attribute;
    }
}
