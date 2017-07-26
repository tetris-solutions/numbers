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
            'searchbudgetlostimpressionshare' => LostImpressionShareSum::spec('searchimpressionshare'),
            'searchranklostimpressionshare' => LostImpressionShareSum::spec('searchimpressionshare'),
            'searchimpressionshare' => ImpressionShareSum::spec(),

            'contentbudgetlostimpressionshare' => LostImpressionShareSum::spec('contentimpressionshare'),
            'contentranklostimpressionshare' => LostImpressionShareSum::spec('contentimpressionshare'),
            'contentimpressionshare' => ImpressionShareSum::spec(),

            'allconversionrate' => RatioSum::spec('allconversions', 'clicks'),
            'averagecost' => RatioSum::spec('cost', 'interactions'),
            'averagecpc' => RatioSum::spec('cost', 'clicks'),
            'averagecpe' => RatioSum::spec('cost', 'engagements'),
            'averagecpm' => RatioSum::spec('cost', 'impressions'),
            'averagecpv' => RatioSum::spec('cost', 'videoviews'),
            'averagefrequency' => RatioSum::spec('impressions', 'impressionreach'),
            'conversionrate' => RatioSum::spec('conversions', 'clicks'),
            'costperallconversion' => RatioSum::spec('cost', 'allconversions'),
            'costperconversion' => RatioSum::spec('cost', 'conversions'),
            'ctr' => RatioSum::spec('clicks', 'impressions'),
            'engagementrate' => RatioSum::spec('engagements', 'impressions'),
            'interactionrate' => RatioSum::spec('interactions', 'impressions'),
            'invalidclickrate' => RatioSum::spec('invalidclicks', 'clicks'),
            'offlineinteractionrate' => RatioSum::spec('numofflineinteractions', 'numofflineimpressions'),
            'valueperallconversion' => RatioSum::spec('allconversionvalue', 'allconversions'),
            'valueperconversion' => RatioSum::spec('conversionvalue', 'conversions'),
            'videoviewrate' => RatioSum::spec('videoviews', 'impressions'),

            'videoquartile25rate' => VideoQuartileSum::spec(25),
            'videoquartile50rate' => VideoQuartileSum::spec(50),
            'videoquartile75rate' => VideoQuartileSum::spec(75),
            'videoquartile100rate' => VideoQuartileSum::spec(100),

            'averageposition' => WeightedSum::spec('impressions'),
            'qualityscore' => WeightedSum::spec('impressions'),
            'roas' => RatioSum::spec('conversionvalue', 'cost'),
            'cpv100' => CPV100Sum::spec('cost', 'videoquartile100rate', 'videoviews')
        ];
    }
}

