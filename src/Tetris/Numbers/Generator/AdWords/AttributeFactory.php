<?php

namespace Tetris\Numbers\Generator\AdWords;

use Tetris\Numbers\Base\Attribute;
use Tetris\Numbers\Generator\Shared\Extensions\DefaultParser;
use Tetris\Numbers\Generator\Shared\AttributeTranslator;
use Tetris\Numbers\Generator\Shared\LegacyTypeParser;
use Tetris\Numbers\Generator\Shared\TransientAttribute;

class AttributeFactory extends \Tetris\Numbers\Generator\Shared\AttributeFactory
{
    protected $parentClass = Attribute::class;
    protected $platform = 'AdWords';

    function __construct()
    {
        $this->legacyParser = new LegacyTypeParser();
        $this->parser = new DefaultParser();
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

    protected function getId(string $entity, string $attributeName): string
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

    protected function normalizeProperty(string $property): string
    {
        switch ($property) {
            case 'AverageQualityScore':
                return 'QualityScore';
            default:
                return $property;
        }
    }

    protected function normalizeType(string $id, string $type, $isSpecialValue, $isPercentage): string
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

        if ($isSpecialValue) {
            return 'special';
        }

        if ($isPercentage) {
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

    protected function legacyDimensionIsParsable(TransientAttribute $attribute): bool
    {
        return $attribute->is_dimension && (
                $attribute->type === 'integer' ||
                $attribute->type === 'list'
            );
    }
}
