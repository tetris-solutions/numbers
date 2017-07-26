<?php

namespace Tetris\Numbers\Generator\AdWords\Extensions;

use Tetris\Numbers\Base\Sum\CPV100Sum;
use Tetris\Numbers\Base\Sum\ImpressionShareSum;
use Tetris\Numbers\Base\Sum\LostImpressionShareSum;
use Tetris\Numbers\Base\Sum\RatioSum;
use Tetris\Numbers\Base\Sum\VideoQuartileSum;
use Tetris\Numbers\Base\Sum\WeightedSum;
use Tetris\Numbers\Generator\Shared\Extension;
use Tetris\Numbers\Generator\Shared\ExtensionApply;

class AdWordsInferredSum implements Extension
{
    use ExtensionApply;

    function __construct()
    {
        $this->map = [
            'searchbudgetlostimpressionshare' => LostImpressionShareSum::sumSpec('searchimpressionshare'),
            'searchranklostimpressionshare' => LostImpressionShareSum::sumSpec('searchimpressionshare'),
            'searchimpressionshare' => ImpressionShareSum::sumSpec(),

            'contentbudgetlostimpressionshare' => LostImpressionShareSum::sumSpec('contentimpressionshare'),
            'contentranklostimpressionshare' => LostImpressionShareSum::sumSpec('contentimpressionshare'),
            'contentimpressionshare' => ImpressionShareSum::sumSpec(),

            'allconversionrate' => RatioSum::sumSpec('allconversions', 'clicks'),
            'averagecost' => RatioSum::sumSpec('cost', 'interactions'),
            'averagecpc' => RatioSum::sumSpec('cost', 'clicks'),
            'averagecpe' => RatioSum::sumSpec('cost', 'engagements'),
            'averagecpm' => RatioSum::sumSpec('cost', 'impressions'),
            'averagecpv' => RatioSum::sumSpec('cost', 'videoviews'),
            'averagefrequency' => RatioSum::sumSpec('impressions', 'impressionreach'),
            'conversionrate' => RatioSum::sumSpec('conversions', 'clicks'),
            'costperallconversion' => RatioSum::sumSpec('cost', 'allconversions'),
            'costperconversion' => RatioSum::sumSpec('cost', 'conversions'),
            'ctr' => RatioSum::sumSpec('clicks', 'impressions'),
            'engagementrate' => RatioSum::sumSpec('engagements', 'impressions'),
            'interactionrate' => RatioSum::sumSpec('interactions', 'impressions'),
            'invalidclickrate' => RatioSum::sumSpec('invalidclicks', 'clicks'),
            'offlineinteractionrate' => RatioSum::sumSpec('numofflineinteractions', 'numofflineimpressions'),
            'valueperallconversion' => RatioSum::sumSpec('allconversionvalue', 'allconversions'),
            'valueperconversion' => RatioSum::sumSpec('conversionvalue', 'conversions'),
            'videoviewrate' => RatioSum::sumSpec('videoviews', 'impressions'),

            'videoquartile25rate' => VideoQuartileSum::sumSpec(25),
            'videoquartile50rate' => VideoQuartileSum::sumSpec(50),
            'videoquartile75rate' => VideoQuartileSum::sumSpec(75),
            'videoquartile100rate' => VideoQuartileSum::sumSpec(100),

            'averageposition' => WeightedSum::sumSpec('impressions'),
            'averagequalityscore' => WeightedSum::sumSpec('impressions'),
            'roas' => RatioSum::sumSpec('conversionvalue', 'cost'),
            'cpv100' => CPV100Sum::sumSpec('cost', 'videoquartile100rate', 'videoviews')
        ];
    }
}

