<?php

namespace Tetris\Numbers\Generator\Facebook;

use Tetris\Numbers\Generator\Facebook\Extensions\FacebookParser;
use Tetris\Numbers\Generator\Shared\AttributeFactory;
use Tetris\Numbers\Generator\Shared\AttributeTranslator;
use Tetris\Numbers\Generator\Shared\TransientAttribute;

class FacebookAttributeFactory extends AttributeFactory
{

    protected $platform = 'Facebook';

    function __construct()
    {
        $this->parser = new FacebookParser();
        $this->translators = [
            new AttributeTranslator('Account', [
                'date_start' => 'date',
                'account_id',
                'account_name'
            ], 'account_'),
            new AttributeTranslator('Ad', [
                'date_start' => 'date',
                'ad_id',
                'ad_name'
            ], 'ad_'),
            new AttributeTranslator('AdSet', [
                'date_start' => 'date',
                'adset_id',
                'adset_name'
            ], 'adset_'),
            new AttributeTranslator('Campaign', [
                'date_start' => 'date',
                'campaign_id',
                'campaign_name'
            ], 'campaign_')
        ];
    }

    protected function isMetric(TransientAttribute $attribute, $group): bool
    {
        $notId = substr($attribute->property, -3) !== '_id';

        return $notId && (
                $attribute->id === 'impressions' ||
                $attribute->type === 'impressions' ||
                $attribute->type === 'unsigned int32' ||
                $attribute->type === 'decimal' ||
                $attribute->type === 'float' ||
                $attribute->type === 'percentage' ||
                $attribute->type === 'numeric string'
            );
    }

    private function containsKeywords($value)
    {
        if (!is_string($value)) return false;

        $keywords = ['cost', 'spend', 'amount'];

        foreach ($keywords as $keyword) {
            if (strpos($value, $keyword) !== FALSE) {
                return true;
            }
        }

        return false;
    }

    private function isCurrency(TransientAttribute $attribute): bool
    {
        return (
            $this->containsKeywords($attribute->id) ||
            $this->containsKeywords($attribute->description)
        );
    }

    private function overrideType(TransientAttribute $attribute, string $originalType)
    {
        switch ($attribute->id) {
            case 'impressions':
                return 'numeric string';
            case 'ctr':
                return 'percentage';
            case 'inline_link_click_ctr':
                return 'percentage';
            case 'view_rate':
                return 'percentage';
            case 'cost_per_10_sec_video_view':
                return 'currency';
            default:
                return $originalType;
        }
    }

    protected function normalizeType(TransientAttribute $attribute, string $originalType, $isSpecialValue, $isPercentage): string
    {
        $type = $this->overrideType($attribute, $originalType);

        switch ($type) {
            case 'unsigned int32':
                return 'integer';
        }

        if ($attribute->is_metric) {
            // type has to be either [currency, percentage, decimal, integer]

            if ($this->isCurrency($attribute)) {
                return 'currency';
            }

            if ($type === 'percentage') {
                return 'percentage';
            }

            return 'decimal';
        }

        return $type;
    }

    protected function isParsable(TransientAttribute $attribute): bool
    {
        return false;
    }

    function normalizeAttributeId(string $id): string
    {
        switch ($id) {
            case 'date_start':
                return 'date';
            default:
                return $id;
        }
    }
}
