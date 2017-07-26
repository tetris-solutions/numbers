<?php

namespace Tetris\Numbers\Generator\AdWords\Extensions;

use Tetris\Numbers\Base\Sum\ImpressionShareSum;
use Tetris\Numbers\Base\Sum\LostImpressionShareSum;
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

            'allconversionrate' => \Tetris\Numbers\customRatioSum('allconversions', 'clicks'),
            'averagecost' => \Tetris\Numbers\customRatioSum('cost', 'interactions'),
            'averagecpc' => \Tetris\Numbers\customRatioSum('cost', 'clicks'),
            'averagecpe' => \Tetris\Numbers\customRatioSum('cost', 'engagements'),
            'averagecpm' => \Tetris\Numbers\customRatioSum('cost', 'impressions'),
            'averagecpv' => \Tetris\Numbers\customRatioSum('cost', 'videoviews'),
            'averagefrequency' => \Tetris\Numbers\customRatioSum('impressions', 'impressionreach'),
            'conversionrate' => \Tetris\Numbers\customRatioSum('conversions', 'clicks'),
            'costperallconversion' => \Tetris\Numbers\customRatioSum('cost', 'allconversions'),
            'costperconversion' => \Tetris\Numbers\customRatioSum('cost', 'conversions'),
            'ctr' => \Tetris\Numbers\customRatioSum('clicks', 'impressions'),
            'engagementrate' => \Tetris\Numbers\customRatioSum('engagements', 'impressions'),
            'interactionrate' => \Tetris\Numbers\customRatioSum('interactions', 'impressions'),
            'invalidclickrate' => \Tetris\Numbers\customRatioSum('invalidclicks', 'clicks'),
            'offlineinteractionrate' => \Tetris\Numbers\customRatioSum('numofflineinteractions', 'numofflineimpressions'),
            'valueperallconversion' => \Tetris\Numbers\customRatioSum('allconversionvalue', 'allconversions'),
            'valueperconversion' => \Tetris\Numbers\customRatioSum('conversionvalue', 'conversions'),
            'videoviewrate' => \Tetris\Numbers\customRatioSum('videoviews', 'impressions'),

            'videoquartile25rate' => \Tetris\Numbers\videoQuartileSum(25),
            'videoquartile50rate' => \Tetris\Numbers\videoQuartileSum(50),
            'videoquartile75rate' => \Tetris\Numbers\videoQuartileSum(75),
            'videoquartile100rate' => \Tetris\Numbers\videoQuartileSum(100),

            'averageposition' => \Tetris\Numbers\weightedAverage('averageposition', 'impressions'),
            'averagequalityscore' => \Tetris\Numbers\weightedAverage('averagequalityscore', 'impressions'),
            'roas' => \Tetris\Numbers\customRatioSum('conversionvalue', 'cost'),
            'cpv100' => \Tetris\Numbers\cpv100AdwordsSum('cost', 'videoquartile100rate', 'videoviews')
        ];
    }
}

