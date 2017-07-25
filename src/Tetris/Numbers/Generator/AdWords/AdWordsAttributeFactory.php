<?php

namespace Tetris\Numbers\Generator\AdWords;

use Tetris\Numbers\Generator\Shared\AttributeFactory;
use Tetris\Numbers\Generator\Shared\Extensions\DefaultParser;
use Tetris\Numbers\Generator\Shared\AttributeTranslator;
use Tetris\Numbers\Generator\Shared\TransientAttribute;

class AdWordsAttributeFactory extends AttributeFactory
{
    protected $platform = 'AdWords';

    function __construct()
    {
        parent::__construct();

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

    protected function normalizeProperty(string $property): string
    {
        switch ($property) {
            case 'AverageQualityScore':
                return 'QualityScore';
            default:
                return $property;
        }
    }

    protected function normalizeType(TransientAttribute $attribute, string $originalType, $isSpecialValue, $isPercentage): string
    {
        $overrideType = [
            'averagecpv' => 'currency',
            'averagecpe' => 'currency',
            'averagecpm' => 'currency',
            'averagequalityscore' => 'decimal'
        ];

        $default = strtolower($originalType);

        if ($attribute->id === 'id') {
            return $default;
        }

        if (isset($overrideType[$attribute->id])) {
            return $overrideType[$attribute->id];
        }

        if ($isSpecialValue) {
            return 'special';
        }

        if ($isPercentage) {
            return 'percentage';
        }

        switch ($originalType) {
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

    protected function isParsable(TransientAttribute $attribute): bool
    {
        return $attribute->is_dimension && (
                $attribute->type === 'integer' ||
                $attribute->type === 'list'
            );
    }
}
