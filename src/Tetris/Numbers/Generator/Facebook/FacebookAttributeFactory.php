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
        parent::__construct();

        $this->parser = new FacebookParser();
        $this->translators = [
            new AttributeTranslator('Account', [
                'account_id',
                'account_name'
            ], 'account_'),
            new AttributeTranslator('Ad', [
                'ad_id',
                'ad_name'
            ], 'ad_'),
            new AttributeTranslator('AdSet', [
                'adset_id',
                'adset_name'
            ], 'adset_'),
            new AttributeTranslator('Campaign', [
                'campaign_id',
                'campaign_name'
            ], 'campaign_')
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

        if ($attribute->is_metric) {
            if ($this->isCurrency($attribute)) {
                return 'currency';
            }

            return $type === 'percentage'
                ? 'percentage'
                : 'decimal';
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
